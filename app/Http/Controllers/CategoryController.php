<?php

// @Author: Achyut Neupane

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

use function PHPSTORM_META\map;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('sub_categories')->get();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category = $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            Category::insert($category);
            session()->flash('toast', ['class' => 'success', 'message' => 'Category ' . $request->name . ' stored']);
            return redirect()->route('listCategory');
        } catch (Throwable $e) {
            LogHelper::store('Category', $e);
            return redirect()->route('listCategory')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $new = Category::find($id);
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $new->name = $request->name;
            $new->description = $request->description;
            $new->save();
            session()->flash('toast', ['class' => 'success', 'message' => 'Category ' . $request->name . ' updated']);
            return redirect()->route('listCategory');
        } catch (Throwable $e) {
            LogHelper::store('Category', $e);
            return redirect()->route('listCategory')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cat = Category::find($id);
            $name = $cat->name;
            $cat->delete();
            session()->flash('toast', ['class' => 'success', 'message' => 'Category ' . $name . ' deleted.']);
            return redirect()->route('listCategory');
        } catch (Throwable $e) {
            LogHelper::store('Category', $e);
            return redirect()->route('listCategory')->withInput();
        }
    }
    public function proposed()
    {
        $cats = SubCategory::where('status','proposed')->get();
        return view('admin.proposed', compact('cats'));
    }
}