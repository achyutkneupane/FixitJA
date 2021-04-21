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


    protected $guarded = [];

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
    
    protected $appends = [
        'rating'
    ];
    
    public function getRatingAttribute()
    {
        return round($this->reviews->avg('rating'),2);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function references()
    {
        return $this->hasMany(References::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
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
        return $this->hasMany(Email::class)->orderBy('primary','DESC');
    }
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
    public function work_hours()
    {
        return $this->hasMany(WorkingHour::class);
    }
    public function email()
    {
        if(!$this->emails->where('primary', true))
            return $this->emails->where('primary', true)->first()->email;
        else
            return $this->emails->first()->email;
    }
    public function getEmail($id)
    {
        return $this->email();
    }
    public function phone()
    {
        return $this->phones->where('primary', true)->first()->phone;
    }
    public function getPhone($id)
    {
        return $this->phone();
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
            case 'independent_contractor':
                return "Independent Contractor";
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
            case 'new':
                return ['name' => 'New', 'class' => 'info'];
                break;
            case 'active':
                return ['name' => 'Active', 'class' => 'success'];
                break;
            case 'reviewing':
                    return ['name' => 'In Review', 'class' => 'info'];
                    break;
            case 'pending':
                return ['name' => 'New', 'class' => 'info'];
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
    public function reviews()
    {
        return $this->hasMany(Review::class, 'review_for')->orderBy('created_at','DESC');
    }
    public function createdReviews()
    {
        return $this->hasMany(Review::class, 'review_by');
    }
    public function refers()
    {
        return $this->hasMany(Refer::class,'referred_by');
    }
    public function referrer()
    {
        return $this->hasOne(Refer::class,'user_id');
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
        $count = 0;
        $documents = $this->documents;
        foreach ($subcategories as $subcategory) {
            $category = $subcategory->category;
            $cat = ['category_id' => $category->id, 'category_name' => $category->name];
            if ($catData->has('cat_' . $cat['category_id'])) {
                $updateCat = $catData->get('cat_' . $cat['category_id']);
                $updateCat['subcategory'][] = $subcategory;
                $catData->put('cat_' . $cat['category_id'], $updateCat);
            } else {
                $catValue = ['category' => $cat,
                             'subcategory' => [$subcategory],
                             'document' => ($documents->count() > 0) ? $documents->where('type','certificate'.$count++)->first() : ''
                            ];
                $catData->put('cat_' . $cat['category_id'], $catValue);
            }
        }
        return $catData;
    }

    public function associatedTasks() {
        if($this->type == 'admin') {
            return Task::with('subcategories')->get();
        }
        else {
            $user = User::find($this->id);
            return Task::with('subcategories')->whereHas('creator',function ($query) use ($user) {
                            $query->where('email', $user->email());
                        })
                        ->orWhere('created_by',$user->id)
                        ->orWhere('created_for',$user->id)
                        ->orWhereHas('assignedBy',function ($query) use ($user) {
                            $query->where('assigned_by', $user->id);
                        })
                        ->orWhereHas('assignedTo',function ($query) use ($user) {
                            $query->where('assigned_To', $user->id);
                        })
                        ->get();
        }
    }
}
