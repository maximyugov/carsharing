<?php

namespace Tests;

use MaximYugov\CarSharing\CarSharing;
use PHPUnit\Framework\TestCase;

class CarSharingTest extends TestCase
{
    public CarSharing $rate;

    public $input = [
            'rate' => 'base',
            'km' => 15.5,
            'minutes' => 30.1,
            'driverAge' => 30,
            'additionalServices' => [],
    ];

    public function setUp(): void
    {
        $this->rate = new CarSharing();
    }

    public function test_can_get_cost_for_base_rate_without_additional_services()
    {
        $this->assertEquals(245.3, $this->rate->getTotalCost($this->input));
    }

    public function test_can_get_cost_for_base_rate_with_additional_service_driver()
    {
        $this->input['additionalServices'][] = 'driver';

        $this->assertEquals(345.3, $this->rate->getTotalCost($this->input));
    }

    public function test_additional_service_wifi_is_not_available_on_base_rate()
    {
        $this->input['additionalServices'][] = 'wifi';

        $this->expectExceptionMessage('Услуга недоступна на выбранном тарифе');

        $this->rate->getTotalCost($this->input);
    }
}