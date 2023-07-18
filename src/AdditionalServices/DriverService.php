<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing\AdditionalServices;

use MaximYugov\CarSharing\Rates\AbstractRate;
use MaximYugov\CarSharing\Rates\StudentRate;

class DriverService extends AbstractAdditionalService
{
    protected int $cost = 100;

    public function getCost()
    {
        return $this->cost;
    }

    public function isAvailable(AbstractRate $rate): bool
    {
        if ($rate instanceof StudentRate) {
            return false;
        }

        return true;
    }
}