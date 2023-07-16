<?php

namespace MaximYugov\CarSharing\AdditionalServices;

class WifiService extends AbstractAdditionalService
{
    protected int $costPerHour = 15;
    protected int $minHours = 2;

    public function getCost(int|float $hours): float
    {
        if ($hours < $this->minHours) {
            return floatval($this->costPerHour * $this->minHours);
        }

        return floatval($hours * $this->costPerHour);
    }
}