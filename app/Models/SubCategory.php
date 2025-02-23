<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'description',
        
        
         
    ];
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'subcategory_user', 'sub_category_id', 'user_id');
    }
}