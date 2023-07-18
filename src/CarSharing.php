<?php

declare(strict_types=1);

namespace MaximYugov\CarSharing;

use MaximYugov\CarSharing\Rates\AbstractRate;

class CarSharing
{
    public function __construct()
    {
    }

    public function getTotalCost(array $input): float
    {
        $additionalServiceCost = 0;

        $rateClass = 'MaximYugov\\CarSharing\\Rates\\' . ucfirst($input['rate']) . 'Rate';

        if (!class_exists($rateClass)) {
            throw new \Exception('Тарифа не существует');
        }

        $rate = new $rateClass();

        if (!$rate->isAvailable($input)) {
            throw new \Exception('Тариф недоступен');
        }

        $rateCost = $rate->getCost($input);

        foreach ($input['additionalServices'] as $additionalServiceName) {
                $additionalServiceCost += $this->getAdditionalServiceCost($additionalServiceName, $input, $rate);
        }

        return floatval($rateCost + $additionalServiceCost);
    }

    protected function getAdditionalServiceCost(string $additionalServiceName, array $input, AbstractRate $rate): float
    {
        $additionalServiceClass = 'MaximYugov\\CarSharing\\AdditionalServices\\' . ucfirst($additionalServiceName) . 'Service';

        if (!class_exists($additionalServiceClass)) {
            throw new \Exception('Услуги не существует');
        }

        $additionalService = new $additionalServiceClass();

        if (!$additionalService->isAvailable($rate)) {
            throw new \Exception('Услуга недоступна на выбранном тарифе');
        }

        return floatval($additionalService->getCost($input));
    }
}
