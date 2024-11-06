<?php

namespace Fcdniproua\Contacts;

use Illuminate\Support\ServiceProvider;

class ContactsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/Views', 'contacts');
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/contacts'),
        ], 'public');
        $this->publishes([
            __DIR__.'/database/migrations' => public_path('migrations'),
        ], 'migrations');
    }

    public function register()
    {

    }
}
