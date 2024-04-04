<?php

namespace NepaliDate\Concerns;

trait DateFormat
{
    /**
     * Get the Nepali date in the YYYY-MM-DD format.
     */
    public function toBS(): string
    {
        return $this->nepaliYear.'-'.sprintf('%02d', $this->nepaliMonth).'-'.sprintf('%02d', $this->nepaliDay);
    }

    /**
     * Get the Nepali date in the custome format.
     *
     * @param  string  $format
     */
    public function toBSformat($format): string
    {
        $search = ['Y', 'm', 'd', 'l', 'F'];

        $replace = [
            $this->nepaliYear,
            $this->nepaliMonth,
            $this->nepaliDay,
            $this->formattedBSDateOfWeek($this->dayOfWeek),
            $this->formattedBSMonth($this->nepaliMonth),
        ];

        return str_replace($search, $replace, $format);
    }

    /**
     * Get the Nepali date in the formatted BS date string.
     */
    public function toFormattedBSDate(): string
    {
        return $this->nepaliDay.' '.
            $this->formattedBSMonth($this->nepaliMonth).' '.
            $this->nepaliYear.','.' '.
            $this->formattedBSDateOfWeek($this->dayOfWeek);
    }

    /**
     * Get the Nepali date in the formatted Nepali date string.
     */
    public function toFormattedNepaliDate(): string
    {
        return $this->formattedNepaliNumber($this->nepaliDay).' '.
            $this->formattedNepaliMonth($this->nepaliMonth).' '.
            $this->formattedNepaliNumber($this->nepaliYear).','.' '.
            $this->formattedNepaliDateOfWeek($this->dayOfWeek);
    }

    /**
     * Get the date in the formatted Nepali date string.
     *
     * @param  string  $format
     */
    public function toNepaliFormat($format): string
    {
        $search = ['Y', 'm', 'd', 'F', 'l'];

        $replace = [
            $this->formattedNepaliNumber($this->nepaliYear),
            $this->formattedNepaliNumber($this->nepaliMonth),
            $this->formattedNepaliNumber($this->nepaliDay),
            $this->formattedNepaliMonth($this->nepaliMonth),
            $this->formattedNepaliDateOfWeek($this->dayOfWeek),
        ];

        return str_replace($search, $replace, $format);
    }
}
