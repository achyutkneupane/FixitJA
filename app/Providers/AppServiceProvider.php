<?php

namespace App\Providers;

use App\Models\User;
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
        Blade::if('isVerified', function () {
            return auth()->user() && Auth::user()->status == "active";
        });
        Blade::if('isAdmin', function () {
            return auth()->user() && Auth::user()->type == "admin";
        });

        Blade::if('onlyForRespectiveUser', function ($id) {
            return auth()->user() && (auth()->user() == User::find($id));
        });
        Blade::if('isUser', function () {
            return auth()->user() && Auth::user()->type == "general_user";
        });
        Blade::if('isBusiness', function () {
            return auth()->user() && Auth::user()->type == "business";
        });
        Blade::if('isContractor', function () {
            return auth()->user() && Auth::user()->type == "individual_contractor";
        });
        Blade::if('isAdminOrContractor', function () {
            return auth()->user() && (Auth::user()->type == "individual_contractor" || Auth::user()->type == "admin");
        });
        Blade::if('isAdminOrUser', function ($id) {
            return auth()->user() && (auth()->user() == User::find($id) || Auth::user()->type == "admin");
        });
    }
}