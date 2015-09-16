<?php

namespace blog\Providers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use blog\Composers\CurrentUserComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot(Factory $factory)
    {
        $factory->composer('*', CurrentUserComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}