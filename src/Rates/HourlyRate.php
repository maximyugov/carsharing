<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing\Rates;

class HourlyRate extends AbstractRate
{
    protected int $hourlyRate = 200;

    public function getCost(array $input): float
    {
        return floatval($input['hours'] * $this->hourlyRate);
    }
}