<?php

namespace Tests\Unit;

use MaximYugov\CarSharing\Rates\HourlyRate;
use PHPUnit\Framework\TestCase;

class HourlyRateTest extends TestCase
{
    public function test_can_get_cost()
    {
        $rate = new HourlyRate();
        $input = [
            'km' => 15.5,
            'hours' => 3,
            'driverAge' => 30,
            'additionalServices' => [],
        ];

        $this->assertEquals(600, $rate->getCost($input));
    }
}