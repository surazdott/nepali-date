<?php

namespace Tests\Feature;

use Carbon\Carbon;
use NepaliDate\Services\NepaliDate;
use Orchestra\Testbench\TestCase;

class NepaliDateTest extends TestCase
{
    public function test_check_toBS()
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toBS();

        $this->assertEquals('2080-12-21', $nepaliDate);
    }

    public function test_check_toBSFormat()
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toBSFormat('Y/m/d');

        $this->assertEquals('2080/12/21', $nepaliDate);
    }

    public function test_check_toFormattedBSDate()
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toFormattedBSDate();

        $this->assertEquals('21 Chaitra 2080, Wednesday', $nepaliDate);
    }
}
