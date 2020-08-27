<?php

declare(strict_types=1);

$app = require __DIR__ . '/../init_application.php';

use PayNL\Sdk\Response\Response;

/** @var Response $response */
$response = $app
    ->setRequest(
        'EncodeQr',
        null,
        null,
        [
            'Qr' => [
                'uuid' => '0',
                'serviceId' => 'SL-0000-0000',
                'secret'    => 'abcdefesds',
                'reference' => 'ABCD0123',
                'amount' => [],
            ],
        ]
    )
    ->run()
;

echo '<pre/>' . PHP_EOL;
echo 'Has errors: ' . var_export($response->hasErrors(), true) . PHP_EOL . PHP_EOL;
echo 'Errors: ' . PHP_EOL . $response->getErrors() . PHP_EOL;