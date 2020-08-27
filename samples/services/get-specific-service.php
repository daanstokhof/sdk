<?php

declare(strict_types=1);

$app = require __DIR__ . '/../init_application.php';

$response = $app
    ->setRequest('GetService', [
        'serviceId' => (isset($config) === true ? $config->get('serviceId') : ''),
    ])
    ->run()
;

print_response($response);