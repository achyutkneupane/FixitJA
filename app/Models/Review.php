<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'review_by');
    }
    public function reviewed()
    {
        return $this->belongsTo(User::class, 'review_for');
    }
}
