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
    public function assignedBy()
    {
        return $this->belongsToMany(User::class, 'assigned_by');
    }
    public function assignedTo()
    {
        return $this->belongsToMany(User::class, 'assigned_to');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function related_task()
    {
        return $this->belongsToMany(Task::class);
    }
}