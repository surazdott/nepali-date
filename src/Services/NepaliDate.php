<?php

namespace NepaliDate\Services;

use Carbon\Carbon;
use NepaliDate\Concerns\CalendarData;
use NepaliDate\Concerns\DateConverter;
use NepaliDate\Concerns\DateFormat;

class NepaliDate
{
    use CalendarData, DateConverter, DateFormat;

    /**
     * Create a NepaliDate instance from a given Carbon date.
     */
    public function create(Carbon $date): self
    {
        $this->year = $date->year;
        $this->month = $date->month;
        $this->day = $date->day;

        $this->setNepaliDate($date->year, $date->month, $date->day);

        return $this;
    }
}
