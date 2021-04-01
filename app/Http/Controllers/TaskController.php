<?php

// @Author: Achyut Neupane

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\Category;
use App\Models\City;
use App\Models\Discussion;
use App\Models\Parish;
use App\Models\SubCategory;
use App\Models\Task;
use App\Models\TaskCreator;
use App\Models\TaskTimeline;
use App\Models\TaskWorkingLocation;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Mail;
use Throwable;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->associatedTasks();
        return view('admin.task.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Project Wizard';
        $page_description = 'This is create project wizard page';
        $user = auth()->user();
        $cats = Category::with('sub_categories')->get();
        $subs = SubCategory::all();
        $parishes = Parish::all();
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        if(!empty(auth()->user()))
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','parishes','user', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
        else
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','parishes', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Classify Sub-Categories
        $Subb = "[".$request->totalProjectCatList."]";
        $Subb = str_replace('},]','}]',$Subb);
        $Subb = json_decode($Subb);
        $all_cats = collect();
        $taskList = collect();
        $parentTask = new Task();
        foreach($Subb as $index => $subCattArray) {
            $subCatt = 'sub_categories'. $subCattArray->fieldId;
            $categoryy = 'categoryTemplate'. $subCattArray->fieldId;
            $task_subcategories = collect();
            $jsonSubCat = json_decode($request->$subCatt);
            foreach($jsonSubCat as $subCat){
                if(empty($subCat->id)){
                    $cat = Category::find($request->$categoryy)->sub_categories()->create([
                        'name' => $subCat->value,
                        'description' => 'Proposed Category'
                    ]);
                    $cat->status = "proposed";
                    $cat->save();
                    $task_subcategories->push($cat);
                    $all_cats->push($cat);
                }
                else {
                    $subCatToPush = $subCat->id;
                    $task_subcategories->push($subCatToPush);
                    $all_cats->push($subCatToPush);
                }
            }
            // Task Store
            $task = new Task();
            $task->created_by = auth()->id() ? auth()->id() : 1;
            $task->name = $request->name;
            $task->description = $request->description;
            $task->type = $request->type;
            $task->payment_type = $request->payment_type;
            $task->deadline = $request->deadline;
            $task->user_equal_working = $request->user_equal_working;
            $task->is_client_on_site = $request->is_client_on_site;
            $task->is_repair_parts_provided = $request->is_repair_parts_provided;
            $task->save();
            if($index == 0)
                $parentTask = $task;
            else
                $taskList->push($task->id);
            // Task Creator Store
            $creator = new TaskCreator();
            $creator->name = $request->user_name;
            $creator->phone = $request->phone;
            $creator->email = $request->email;
            $creator->city_id = $request->city;
            $creator->street_01 = $request->street_01;
            $creator->street_02 = $request->street_02;
            $creator->house_number = $request->house_number;
            $creator->postal_code = $request->postal_code;
            $task->creator()->save($creator);

            //Task Location Store
            if(!$request->user_equal_working) {
                $location = new TaskWorkingLocation();
                $location->city_id = $request->site_city;
                $location->street_01 = $request->site_street_01;
                $location->street_02 = $request->site_street_02;
                $location->house_number = $request->site_house_number;
                $location->postal_code = $request->site_postal_code;
                $task->location()->save($location);
            }
            // else {
            //     $location = new TaskWorkingLocation();
            //     $location->city_id = $request->city;
            //     $location->street_01 = $request->street_01;
            //     $location->street_02 = $request->street_02;
            //     $location->house_number = $request->house_number;
            //     $location->postal_code = $request->postal_code;
            //     $task->location()->save($location);
            // }
            $task->subcategories()->attach($task_subcategories);
            $log = new TaskTimeline();
            $log->status = 'created';
            $log->user_by = auth()->id();
            $log->description = "Task <b>".$request->name."</b> has been created.";
            $task->logs()->save($log);
        }
        $city = City::with('parish')->find($request->city);
        $site_city = City::with('parish')->find($request->site_city);
        try {
            Mail::send('mail.createTask', compact('request','all_cats','city','site_city'), function($message) use ($request)
            {
                $message->to($request->email, $request->user_name)->subject('Task Created');
            });
        } catch(Throwable $e) {
            LogHelper::storeMessage('Create task E-mail',$e->getMessage(),auth()->user(),'Email Cant be sent.');
        }
        $parentTask->related_tasks()->attach($taskList);
        return redirect()->route('listTask');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('creator.city.parish','location.city.parish')->find($id);
        return view('admin.task.viewTask', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with('creator.city.parish','location.city.parish')->find($id);
        $parishes = Parish::all();
        return view('admin.task.editTask', compact('task','parishes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function assignedBy($id)
    {
        try {
            $task = Task::find($id);
            return view('admin.task.assignedBy', compact('task'));
        } catch (Throwable $e) {
            LogHelper::store('Category', $e);
            return redirect()->route('listTask');
        }
    }
    public function assignedTo($id)
    {
        try {
            $task = Task::find($id);
            return view('admin.task.assignedTo', compact('task'));
        } catch (Exception $e) {
            LogHelper::store('Category', $e);
            return redirect()->route('listTask');
        }
    }
    public function createProjectwithCat($catId)
    {
        if(!empty($catId))
            session()->flash('catId',$catId);
        return redirect()->route('createProject');
    }
    public function categoryRequest(Request $request)
    {
        session()->flash('catId',$request->catId);
        return redirect()->route('createProject');
    }
    public function createProjectwithSub($subCatId)
    {
        if(!empty($subCatId))
            session()->flash('subCatId',$subCatId);
        return redirect()->route('createProject');
    }
    public function editTaskCreator(Request $request,$id)
    {
        $task = Task::with('creator')->find($id);
        $creator = $task->creator;
        $creator->name = $request->creator_name;
        $creator->email = $request->creator_email;
        $creator->phone = $request->creator_phone;
        $creator->city_id = $request->city;
        $creator->street_01 = $request->creator_street_01;
        $creator->street_02 = $request->creator_street_02;
        $creator->save();
        $task->logs()->create([
            'status'=>'changed',
            'user_by'=>auth()->id(),
            'description'=>'Task Creator Details has been edited.'
        ]);
        return redirect()->route('viewTask',$id);
    } 
    public function editTaskDetails(Request $request,$id)
    {
        $task = Task::with('location')->find($id);
        $task->type = $request->type;
        $task->payment_type = $request->payment_type;
        $task->deadline = $request->deadline;
        $task->is_client_on_site = $request->is_client_on_site;
        $task->is_repair_parts_provided = $request->is_repair_parts_provided;
        if(!$task->user_equal_working) {
            $task->location->city_id = $request->workingCity;
            $task->location->street_01 = $request->street_01;
            $task->location->street_02 = $request->street_02;
            $task->location->save();
            }
        else {
            $location = new TaskWorkingLocation();
            $location->city_id = $request->workingCity;
            $location->street_01 = $request->street_01;
            $location->street_02 = $request->street_02;
            $task->location()->save($location);
        }
        $task->user_equal_working ? $task->user_equal_working = '0' : '';
        $task->save();
        $task->logs()->create([
            'status'=>'changed',
            'user_by'=>auth()->id(),
            'description'=>'Task Details has been edited.'
        ]);
        return redirect()->route('viewTask',$id);
    } 
    public function taskTimeline($id)
    {
        $logs = TaskTimeline::with('task','log_by','log_for')->orderBy('created_at','DESC')->where('task_id',$id)->paginate(10);
        return view('admin.task.taskTimeline',compact('logs'));
    }
    public function taskDiscussion($id)
    {
        $discussions = Discussion::with('user')->orderBy('created_at','DESC')->where('task_id',$id)->get();
        $task = Task::find($id);
        return view('admin.task.taskDiscussion',compact('task','discussions'));
    }
    public function postDiscussion(Request $request,$id)
    {
        $discussion = new Discussion();
        $discussion->message = $request->discussionText;
        $discussion->task_id = $id;
        $discussion->user_id = auth()->id();
        $discussion->save();
        return redirect()->route('taskDiscussion',$id);
    }
}