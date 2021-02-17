<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'type',
        'gender',
        'companyname',
        'website',
        'experience',
        'profile_image',
        'verification_code',
        'certificate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function first_name()
    {
        return strtok(Auth::user()->name,  ' ');
    }
    public function role()
    {
        switch ($this->type) {
            case 'admin':
                return "Admin";
                break;
            case 'individual_contractor':
                return "Individual Contractor";
                break;
            case 'business':
                return "Business";
                break;
            case 'general_user':
                return "User";
                break;
            default:
                return "";
        }
    }
    public function isVerified()
    {
        if ($this->status == "pending") {
            return "Not Verified";
        } else {
            return "Verified";
        }
    }



    public function created_by()
    {
        return $this->hasMany(Task::class, 'created_by');
    }
    public function created_for()
    {
        return $this->hasMany(Task::class, 'created_for');
    }
    public function assigned_by()
    {
        return $this->hasMany(Task::class, 'assigned_by');
    }
    public function assigned_to()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
}