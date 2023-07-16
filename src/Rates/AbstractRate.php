<?php

namespace MaximYugov\CarSharing\Rates;

abstract class AbstractRate
{
    public function isAvailable(array $input): bool
    {
        return true;
    }
}