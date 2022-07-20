<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Common_funcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 共通関数　Common_func 登録
        //   app()->singleton('Common_func', 'App\Library\Common_func');
        $this->app->bind('Common_func', 'App\Library\Common_func');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
