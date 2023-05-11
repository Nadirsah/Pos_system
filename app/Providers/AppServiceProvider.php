<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Models\AyarlarModel;

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
        view()->share('profil',AyarlarModel::first()); 

        Paginator::useBootstrap();

        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}
