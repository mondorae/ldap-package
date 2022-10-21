<?php

namespace BThanh\FirstPackage;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FirstPackageServiceProvider extends ServiceProvider
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
        //
        //load routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        //load views
//        $this->loadViewsFrom(__DIR__ . '/views', 'FirstPackage');
        //load migration
//        $this->loadMigrationsFrom(__DIR__ . 'database/migrations');
        //load config
        $this->mergeConfigFrom(
            __DIR__ . '/config/ldap.php',
            'ldap'
        );
        $this->publishes([
            __DIR__ . '/config/ldap.php' => config_path('ldap.php'),
        ]);
    }
}
