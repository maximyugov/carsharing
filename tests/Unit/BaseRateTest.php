<?php

namespace Tests\Unit;

use MaximYugov\CarSharing\Rates\BaseRate;
use PHPUnit\Framework\TestCase;

class BaseRateTest extends TestCase
{
    /**
     * @test
     */
    public function test_rate_is_basic()
    {
        $rate = new BaseRate();
        $this->assertInstanceOf('MaximYugov\CarSharing\Rates\BaseRate', $rate);
    }

    public function test_can_get_cost()
    {
        $rate = new BaseRate();
        $input = [
            'km' => 15.5,
            'minutes' => 30.1,
            'driverAge' => 30,
            'additionalServices' => [],
        ];

        $this->assertEquals(245.3, $rate->getCost($input));
    }

    public function test_base_rate_is_available()
    {
        $rate = new BaseRate();
        $input = [];

        $this->assertTrue($rate->isAvailable($input));
    }
}