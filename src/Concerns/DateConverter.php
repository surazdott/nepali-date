<?php

namespace NepaliDate\Concerns;

trait DateConverter
{
    /**
     * Check if the given year is a leap year or not.
     */
    public function isLeapYear(int $year): bool
    {
        return $year % 100 == 0
            ? ($year % 400 == 0 ? true : false)
            : ($year % 4 == 0 ? true : false);
    }

    /**
     * Calculate the total number of days passed in English calendar from a given date.
     */
    public function calculateTotalEnglishDays(int $year, int $month, int $day): int
    {
        $totalEnglishDays = 0;

        // Accumulate days for each year from 1944 to the input year
        for ($i = 1944; $i < $year; $i++) {
            $totalEnglishDays += $this->isLeapYear($i)
                ? array_sum($this->leapMonths)
                : array_sum($this->normalMonths);
        }

        // Accumulate days for each month in the input year until the input month
        for ($i = 0; $i < $month - 1; $i++) {
            $totalEnglishDays += $this->isLeapYear($year)
                ? $this->leapMonths[$i]
                : $this->normalMonths[$i];
        }

        // Add the days of the input month
        $totalEnglishDays += $day;

        return $totalEnglishDays;
    }

    /**
     * Perform calculation based on the total number of English days
     */
    public function performCalculationbasedOn(int $totalEngilishDays): void
    {
        $i = 0;
        $j = $this->nepaliMonth;

        $nepaliYear = 2000;
        $nepaliMonth = 9;

        $nepaliDay = 16;
        $dayOfWeek = 6;

        while ($totalEngilishDays != 0) {
            $lastDayOfMonth = $this->calendarData[$i][$j];

            $nepaliDay++;
            $dayOfWeek++;

            if ($nepaliDay > $lastDayOfMonth) {
                $nepaliMonth++;
                $nepaliDay = 1;
                $j++;
            }

            if ($dayOfWeek > 7) {
                $dayOfWeek = 1;
            }

            if ($nepaliMonth > 12) {
                $nepaliYear++;
                $nepaliMonth = 1;
            }

            if ($j > 12) {
                $j = 1;
                $i++;
            }

            $this->nepaliYear = $nepaliYear;
            $this->nepaliMonth = $nepaliMonth;
            $this->nepaliDay = $nepaliDay;
            $this->dayOfWeek = $dayOfWeek;

            $totalEngilishDays--;
        }
    }

    /**
     * Return the formatted name of the month in the Bikram Sambat (BS) calendar.
     */
    public function formattedBSMonth(int $month): string
    {
        return $this->monthsInBS[$month];
    }

    /**
     * Return the formatted name of the day of the week in the Bikram Sambat (BS) calendar.
     */
    public function formattedBSDateOfWeek(int $dayOfWeek): string
    {
        return $this->dayOfWeekInBS[$dayOfWeek];
    }

    /**
     * Return the formatted name of the month in the Nepali calendar.
     */
    public function formattedNepaliMonth(int $month): string
    {
        return $this->monthsInNepali[$month];
    }

    /**
     * Return the formatted name of the day of the week in the Nepali calendar.
     */
    public function formattedNepaliDateOfWeek(int $dayOfWeek): string
    {
        return $this->dayOfWeekInNepali[$dayOfWeek];
    }

    /**
     * Return the formatted Nepali representation of a number.
     */
    public function formattedNepaliNumber(mixed $value): string
    {
        $numbers = str_split($value);

        foreach ($numbers as $key => $number) {
            $numbers[$key] = $this->numbersInNepali[$number];
        }

        return implode('', $numbers);
    }

    /**
     * Set the Nepali date based on the provided English date.
     */
    private function setNepaliDate(int $year, int $month, int $day): void
    {
        $totalEngilishDays = $this->calculateTotalEnglishDays(
            $year,
            $month,
            $day
        );

        $this->performCalculationbasedOn($totalEngilishDays);
    }
}
