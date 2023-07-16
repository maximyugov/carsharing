<?php

namespace Tests\Unit;

use MaximYugov\CarSharing\Rates\BasicRate;
use PHPUnit\Framework\TestCase;

class BasicRateTest extends TestCase
{
    /**
     * @test
     */
    public function test_rate_is_basic()
    {
        $rate = new BasicRate();
        $this->assertInstanceOf('MaximYugov\CarSharing\Rates\BasicRate', $rate);
    }
}