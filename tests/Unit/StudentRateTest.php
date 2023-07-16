<?php

namespace Tests\Unit;

use MaximYugov\CarSharing\Rates\StudentRate;
use PHPUnit\Framework\TestCase;

class StudentRateTest extends TestCase
{
    public function test_can_get_cost()
    {
        $rate = new StudentRate();
        $input = [
            'km' => 15.5,
            'minutes' => 60,
            'driverAge' => 18,
            'additionalServices' => [],
        ];

        $this->assertEquals(122, $rate->getCost($input));
    }

    public function test_rate_is_not_available_if_older_than_max_age()
    {
        $rate = new StudentRate();
        $input = [
            'km' => 15.5,
            'minutes' => 60,
            'driverAge' => 25,
            'additionalServices' => [],
        ];

        $this->assertFalse($rate->isAvailabe($input));
    }
}