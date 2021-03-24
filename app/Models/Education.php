<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_instution_name',
        'degree',
        'start_date',
        'end_date',
        'gpa',
        
         
    ];
     protected $guarded = [];
    public function user()
    {
        return $this->hasMany(User::class);
    }
   
}
