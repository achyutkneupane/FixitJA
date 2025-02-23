<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
