<?php

namespace Tests;

use Carbon\Carbon;
use NepaliDate\Services\NepaliDate;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class NepaliDateTest extends TestCase
{
    #[Test]
    public function test_check_toBS(): void
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toBS();

        $this->assertEquals('2080-12-21', $nepaliDate);
    }

    #[Test]
    public function test_check_toBSFormat(): void
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toBSFormat('Y/m/d');

        $this->assertEquals('2080/12/21', $nepaliDate);
    }

    #[Test]
    public function test_check_toFormattedBSDate(): void
    {
        $englishDate = Carbon::create('2024-04-03');
        $nepaliDate = new NepaliDate();
        $nepaliDate = $nepaliDate->create($englishDate)->toFormattedBSDate();

        $this->assertEquals('21 Chaitra 2080, Wednesday', $nepaliDate);
    }
}
