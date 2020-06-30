<?php

namespace App\Providers;

use App\Category;
use App\CoursePackage;
use App\Reply;
use Illuminate\Support\ServiceProvider;
use App\Channel;
use App\Discussion;
use App\User;
use App\UsersCourse;
use Auth;
use View;
use Illuminate\Support\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('channels' , Channel::all());
        View::share('categories' , Category::all());
        View::share('alluser' , User::all());
        View::share('us' , UsersCourse::where('user_id',Auth::id())->get());
        View::share('package' , CoursePackage::all());

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        \Carbon\Carbon::setLocale('id');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
