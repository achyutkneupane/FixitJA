<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function created_for()
    {
        return $this->belongsTo(User::class, 'created_for');
    }
    public function assigned_by()
    {
        return $this->belongsToMany(User::class, 'assigned_by');
    }
    public function assigned_to()
    {
        return $this->belongsToMany(User::class, 'assigned_to');
    }
    public function related_task()
    {
        return $this->belongsToMany(Task::class, 'related_task_id');
    }
}