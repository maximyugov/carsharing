<?php

namespace MaximYugov\CarSharing\AdditionalServices;

use MaximYugov\CarSharing\Rates\AbstractRate;
use MaximYugov\CarSharing\Rates\BaseRate;

class WifiService extends AbstractAdditionalService
{
    protected int $costPerHour = 15;
    protected int $minHours = 2;

    public function getCost(array $input): float
    {
        if ($input['hours'] < $this->minHours) {
            return floatval($this->costPerHour * $this->minHours);
        }

        return floatval($input['hours'] * $this->costPerHour);
    }

    public function isAvailable(AbstractRate $rate): bool
    {
        if ($rate instanceof BaseRate) {
            return false;
        }

        return true;
    }
}