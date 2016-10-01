<?php

namespace App\Providers;

use DB;
use App\Helpers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $helpers = new Helpers;
        app()->bind('Helpers', $helpers);
        // DB::listen(function($query) {
        //     var_dump($query->sql);
        // });
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
