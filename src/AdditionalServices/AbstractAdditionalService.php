<?php

namespace MaximYugov\CarSharing\AdditionalServices;

use MaximYugov\CarSharing\Rates\AbstractRate;

abstract class AbstractAdditionalService
{
    public function isAvailable(AbstractRate $rate): bool
    {
        return true;
    }
}