<?php

namespace App\Providers;

use \App;
use App\Classes\CommentLikes;
use Illuminate\Support\ServiceProvider;

class CommentLikesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('commentLike', funtion() {
            return false;
        });
    }
}
