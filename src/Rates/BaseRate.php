<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing\Rates;

class BaseRate extends AbstractRate
{
    protected int $kmRate = 10;
    protected int $minutesRate = 3;

    public function getCost(array $input): float
    {
        return floatval($input['km'] * $this->kmRate + $input['minutes'] * $this->minutesRate);
    }
}