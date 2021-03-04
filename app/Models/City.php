<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class,'working_location');
    }
    public function taskCreators()
    {
        return $this->hasMany(Task::class, 'creator_city_id');
    }
    public function taskSites()
    {
        return $this->hasMany(Task::class, 'site_city_id');
    }
}