<?php

namespace AppsDept\LaravelLankaBellSMS;

use Illuminate\Support\ServiceProvider;

class LankaBellServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/lankabell.php' => config_path('lankabell.php'),
        ]);
    }

    public function register()
    {

        $this->app->bind('lankabellsms', function ($app) {
            return new LankaBellSMS();
        });
    }
}
