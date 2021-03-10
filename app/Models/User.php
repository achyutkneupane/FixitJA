<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CacheHelper;


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
         'profile',
         
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
    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_user', 'user_id', 'sub_category_id');
    }
    public function emails()
    {
        return $this->hasMany(Email::class);
    }
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
    public function email()
    {
        return User::find(auth()->id())->emails->where('primary', true)->first()->email;
    }
    public function getEmail($id)
    {
        return User::find($id)->emails->where('primary', true)->first()->email;
    }
    public function phone()
    {
        return User::find(auth()->id())->phones->where('primary', true)->first()->phone;
    }
    public function getPhone($id)
    {
        return User::find($id)->phones->where('primary', true)->first()->phone;
    }
    public function first_name()
    {
        return explode(' ', $this->name, 2)[0];
    }
    public function last_name()
    {
        $ln = explode(' ', $this->name, 2);
        return !empty($ln[1]) ? $ln[1] : '';
    }
    public function isVerified()
    {
        if ($this->status == "pending") {
            return "Not Verified";
        } else {
            return "Verified";
        }
    }
    public function userType()
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
                return "General User";
                break;
            default:
                return "";
        }
    }
    public function userStatus()
    {
        switch ($this->status) {
            case 'active':
                return ['name' => 'Active', 'class' => 'success'];
                break;
            case 'pending':
                return ['name' => 'Pending', 'class' => 'info'];
                break;
            case 'suspended':
                return ['name' => 'Suspended', 'class' => 'warning'];
                break;
            case 'blocked':
                return ['name' => 'Blocked', 'class' => 'danger'];
                break;
            case 'deactivated':
                return ['name' => 'Deactivated', 'class' => 'danger'];
                break;
            case 'deleted':
                return ['name' => 'Deleted', 'class' => 'danger'];
                break;
            default:
                return "";
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



    public function found_by()
    {
        return $this->hasMany(ErrorLog::class, 'found_by');
    }
    public function solved_by()
    {
        return $this->hasMany(ErrorLog::class, 'solved_by');
    }

    public function allCategories()
    {
        $subcategories = $this->subcategories;
        $catData = collect([]);
        foreach ($subcategories as $subcategory) {
            $cat = CacheHelper::subcategory($subcategory);
            if ($catData->has('cat_' . $cat['category_id'])) {
                $updateCat = $catData->get('cat_' . $cat['category_id']);
                $updateCat['subcategory'][] = $subcategory;
                $catData->put('cat_' . $cat['category_id'], $updateCat);
            } else {
                $catValue = ['category' => $cat, 'subcategory' => [$subcategory]];
                $catData->put('cat_' . $cat['category_id'], $catValue);
            }
        }
        return $catData;
    }
}