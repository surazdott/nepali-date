<?php

namespace NepaliDate\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use NepaliDate\Facades\NepaliDate;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Carbon::macro('toBS', function () {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toBS();
        });

        Carbon::macro('toBSFormat', function ($format = null) {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toBSFormat($format);
        });

        Carbon::macro('toNepaliFormat', function ($format) {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toNepaliFormat($format);
        });

        Carbon::macro('toFormattedBSDate', function () {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toFormattedBSDate();
        });

        Carbon::macro('toNepaliDate', function () {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toFormattedNepaliDate();
        });

        Carbon::macro('toFormattedNepaliDate', function () {
            /** @var Carbon $this */
            return NepaliDate::create($this)->toFormattedNepaliDate();
        });
    }
}
