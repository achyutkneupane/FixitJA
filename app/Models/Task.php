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
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function related_task()
    {
        return $this->belongsToMany(Task::class);
    }
    public function workingLocation()
    {
        return $this->belongsTo(City::class, 'working_location');
    }
}