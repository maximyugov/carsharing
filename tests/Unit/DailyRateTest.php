<?php

namespace Tests\Unit;

use MaximYugov\CarSharing\Rates\DailyRate;
use PHPUnit\Framework\TestCase;

class DailyRateTest extends TestCase
{
    public function test_can_get_cost()
    {
        $rate = new DailyRate();
        $input = [
            'km' => 15.5,
            'days' => 2,
            'driverAge' => 30,
            'additionalServices' => [],
        ];

        $this->assertEquals(2000, $rate->getCost($input));
    }
}