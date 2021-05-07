<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Task;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Blade::if('notVerified', function () {
            return empty(auth()->user()->email_verified_at);
        });
        Blade::if('isVerified', function () {
            return !empty(auth()->user()->email_verified_at);
        });
        Blade::if('formToBeFilled', function () {
            return auth()->user()->type == "independent_contractor" && auth()->user()->status == "new";
        });
        Blade::if('notApproved', function () {
            return auth()->user()->type == "independent_contractor" && auth()->user()->status == "pending";
        });
        Blade::if('isReviewing', function(){
            return auth()->user()->type == "independent_contractor" && auth()->user()->status == "reviewing";
        });
        Blade::if('isAdmin', function () {
            return auth()->user()->type == "admin";
        });
        Blade::if('isUser', function () {
            return auth()->user()->type == "general_user";
        });
        Blade::if('isBusiness', function () {
            return auth()->user()->type == "business";
        });
        Blade::if('isContractor', function () {
            return auth()->user()->type == "independent_contractor";
        });
        Blade::if('isAdminOrContractor', function () {
            return (auth()->user()->type == "independent_contractor" || auth()->user()->type == "admin");
        });
        Blade::if('isAdminOrUser', function ($user) {
            return (auth()->user() == $user || auth()->user()->type == "admin");
        });
        Blade::if('onlyForRespectiveUser', function ($user) {
            return (auth()->user() == $user);
        });
        Blade::if('userIsContractor', function ($user) {
            return $user->type == "independent_contractor";
        });
        Blade::if('isTaskCreator', function($task,$user){
            return $user == Task::find($task)->created_by;
        });
        if(Schema::hasTable('categories'))
            view()->share('navbarCategories', Category::limit(6)->with(['sub_categories' => function($query){ return $query->limit(2);}])->get());
        if(Schema::hasTable('cities'))
            view()->share('cities',City::get());
    }
}