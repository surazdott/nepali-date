<?php

namespace NepaliDate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \NepaliDate\Services\NepaliDate create(\Carbon\Carbon $date)
 *
 * @see \NepaliDate\Services\NepaliDate
 */
class NepaliDate extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'nepaliDate';
    }
}
