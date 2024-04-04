<?php

namespace NepaliDate\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use NepaliDate\Facades\NepaliDate;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('toBS', function () {
            return NepaliDate::create($this)->toBS();
        });

        Carbon::macro('toBSFormat', function ($format = null) {
            return NepaliDate::create($this)->toBSFormat($format);
        });

        Carbon::macro('toNepaliFormat', function ($format) {
            return NepaliDate::create($this)->toNepaliFormat($format);
        });

        Carbon::macro('toFormattedBSDate', function () {
            return NepaliDate::create($this)->toFormattedBSDate();
        });

        Carbon::macro('toNepaliDate', function () {
            return NepaliDate::create($this)->toFormattedNepaliDate();
        });

        Carbon::macro('toFormattedNepaliDate', function () {
            return NepaliDate::create($this)->toFormattedNepaliDate();
        });
    }
}
