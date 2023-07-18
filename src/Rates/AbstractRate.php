<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing\Rates;

abstract class AbstractRate
{
    public function isAvailable(array $input): bool
    {
        return true;
    }
}