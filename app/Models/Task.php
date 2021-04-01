<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function createdFor()
    {
        return $this->belongsTo(User::class, 'created_for');
    }
    public function creator()
    {
        return $this->hasOne(TaskCreator::class);
    }
    public function location()
    {
        return $this->hasOne(TaskWorkingLocation::class);
    }
    public function logs()
    {
        return $this->hasMany(TaskTimeline::class);
    }
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_task', 'task_id', 'sub_category_id');
    }
    public function assignedBy()
    {
        return $this->belongsToMany(User::class, 'assignedBy_task', 'task_id', 'assigned_by');
    }
    public function assignedTo()
    {
        return $this->belongsToMany(User::class, 'assignedTo_task', 'task_id', 'assigned_to');
    }
    public function related_tasks()
    {
        return $this->belongsToMany($this,'relatedTasks','task_id','related_task_id');
    }
    public function parentTask() 
    {
        return $this->belongsToMany($this,'relatedTasks','related_task_id','task_id');
    }
    public function workingLocation()
    {
        return $this->belongsTo(City::class, 'working_location');
    }
    public function category() {
        return $this->subcategories()->first()->category;
    }
    public function relatedTasks() {
        $returnTasks = collect();
        if($this->parentTask()->first() !== NULL){
            $returnTasks = $this->parentTask()->get();
            $related = $returnTasks->first()->related_tasks()->get()->where('id','!=',$this->id)->first();
            $returnTasks->push($related);
        }
        else {
            $returnTasks = $this->related_tasks()->get();
        }
        return $returnTasks;
    }
}