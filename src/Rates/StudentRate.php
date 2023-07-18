<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing\Rates;

class StudentRate extends AbstractRate
{
    protected int $kmRate = 4;
    protected int $minutesRate = 1;
    protected int $maxAge = 24;

    public function getCost(array $input): float
    {
        return floatval($input['km'] * $this->kmRate + $input['minutes'] * $this->minutesRate);
    }

    public function isAvailabe(array $input): bool
    {
        if ($input['driverAge'] > $this->maxAge) {
            return false;
        }

        return true;
    }
}