<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTimeline extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    public function log_by()
    {
        return $this->belongsToMany(User::class, 'task_timelines', 'id', 'user_by');
    }
    public function log_for()
    {
        return $this->belongsToMany(User::class, 'task_timelines', 'id', 'user_to');
    }
}
