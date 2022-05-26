<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Bind NavFacade
        App::bind('NavHelper',function(){
            return new \App\Helpers\NavHelper;
        });
        //Bind OptionHelper
        App::bind('OptionHelper',function(){
            return new \App\Helpers\OptionHelper;
        });
        //Bind Setting
        App::bind('Setting',function(){
            return new \App\Services\SettingService;
        });
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
