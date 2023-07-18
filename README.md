# Модуль расчета стоимости каршеринга

Тестовое задание для SOTNIKOV - Digital Studio.

## Тестирование

`git clone https://github.com/maximyugov/carsharing.git`

`cd carsharing`

`composer install`

`./vendor/bin/phpunit tests --colors`

## Пример использования

```php
require 'vendor/autoload.php';

use MaximYugov\CarSharing\CarSharing;

$carSharing = new CarSharing();

try {
    $cost = $carSharing->getTotalCost($request);
} catch (Exception $e) {
    $response = [
        'message' => $e->getMessage()
    ];

    return json_encode($response);
}

$response = [
    'result' => $cost
];

return json_encode($response);
```