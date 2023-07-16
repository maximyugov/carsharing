<?php

namespace MaximYugov\CarSharing;

class CarSharing
{
    public function __construct()
    {
    }

    public function getTotalCost(array $input): array
    {
        $additionalServiceCost = 0;

        $rateClass = ucfirst($input['rate']) . 'Rate';

        if (!class_exists($rateClass)) {
            throw new Exception('Тарифа не существует');
        }

        $rate = new $rateClass();

        if (!$rate->isAvailable($input)) {
            throw new Exception('Тариф недоступен');
        }

        $rateCost = $rate->getCost($input);

        foreach ($input['additionalServices'] as $additionalServiceName) {
            $additionalServiceCost += $this->getAdditionalServiceCost($additionalServiceName, $input);
        }

        return $rateCost + $additionalServiceCost;
    }

    protected function getAdditionalServiceCost(string $additionalServiceName, array $input): float
    {
        $additionalServiceClass = ucfirst($additionalServiceName) . 'Service';

        if (!class_exists($additionalServiceClass)) {
            throw new Exception('Услуги не существует');
        }

        $additionalService = new $additionalServiceClass();

        if (!$additionalService->isAvailable) {
            throw new Exception('Услуга недоступна на выбранном тарифе');
        }

        return floatval($additionalService->getCost($input));
    }
}
