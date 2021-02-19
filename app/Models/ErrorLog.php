<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function foundBy()
    {
        return $this->belongsTo(User::class, 'found_by');
    }
    public function solvedBy()
    {
        return $this->belongsTo(User::class, 'solved_by');
    }
}