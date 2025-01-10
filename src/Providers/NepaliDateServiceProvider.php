<?php

namespace NepaliDate\Providers;

use Illuminate\Support\ServiceProvider;
use NepaliDate\Services\NepaliDate as NepaliDateService;

class NepaliDateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function register(): void
    {
        $this->app->bind('nepaliDate', function () {
            return new NepaliDateService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
