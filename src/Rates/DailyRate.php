<?php

namespace MaximYugov\CarSharing\Rates;

class DailyRate extends AbstractRate
{
    protected int $dailyRate = 1000;

    public function getCost(array $input): float
    {
        return floatval($input['days'] * $this->dailyRate);
    }
}