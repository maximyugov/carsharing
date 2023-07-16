<?php

namespace Tests;

use MaximYugov\CarSharing\CarSharing;
use PHPUnit\Framework\TestCase;

class CarSharingTest extends TestCase
{
    /**
     * @test
     */
    public function test_can_get_cost_for_base_rate_without_additional_services()
    {
        $rate = new CarSharing();

        $input = [
            'rate' => 'base',
            'km' => 15.5,
            'minutes' => 30.1,
            'driverAge' => 30,
            'additionalServices' => [],
        ];

        $this->assertEquals(245.3, $rate->getTotalCost($input));
    }

    public function test_can_get_cost_for_base_rate_with_additional_service_driver()
    {
        $rate = new CarSharing();

        $input = [
            'rate' => 'base',
            'km' => 15.5,
            'minutes' => 30.1,
            'driverAge' => 30,
            'additionalServices' => [
                'driver'
            ],
        ];

        $this->assertEquals(345.3, $rate->getTotalCost($input));
    }

    public function test_additional_service_wifi_is_not_available_on_base_rate()
    {
        $rate = new CarSharing();

        $input = [
            'rate' => 'base',
            'km' => 15.5,
            'minutes' => 30.1,
            'driverAge' => 30,
            'additionalServices' => [
                'wifi'
            ],
        ];

        $this->expectExceptionMessage('Услуга недоступна на выбранном тарифе');

        $rate->getTotalCost($input);
    }
}