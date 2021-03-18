<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
            return auth()->user() && empty(auth()->user()->email_verified_at);
        });
        Blade::if('isVerified', function () {
            return auth()->user() && !empty(auth()->user()->email_verified_at);
        });
        Blade::if('formToBeFilled', function () {
            return auth()->user() && auth()->user()->type == "individual_contractor" && auth()->user()->status == "new";
        });
        Blade::if('notApproved', function () {
            return auth()->user() && auth()->user()->type == "individual_contractor" && auth()->user()->status == "pending";
        });
        Blade::if('isReviewing', function(){
            return auth()->user() && auth()->user()->type == "individual_contractor" && auth()->user()->status == "reviewing";
        });
        Blade::if('isAdmin', function () {
            return auth()->user() && auth()->user()->type == "admin";
        });
        Blade::if('isUser', function () {
            return auth()->user() && auth()->user()->type == "general_user";
        });
        Blade::if('isBusiness', function () {
            return auth()->user() && auth()->user()->type == "business";
        });
        Blade::if('isContractor', function () {
            return auth()->user() && auth()->user()->type == "individual_contractor";
        });
        Blade::if('isAdminOrContractor', function () {
            return auth()->user() && (auth()->user()->type == "individual_contractor" || auth()->user()->type == "admin");
        });
        Blade::if('isAdminOrUser', function ($id) {
            return auth()->user() && (auth()->user() == User::find($id) || auth()->user()->type == "admin");
        });
        Blade::if('onlyForRespectiveUser', function ($id) {
            return auth()->user() && (auth()->user() == User::find($id));
        });
        Blade::if('userIsContractor', function ($user) {
            return auth()->user() && $user->type == "individual_contractor";
        });
        
    }
}