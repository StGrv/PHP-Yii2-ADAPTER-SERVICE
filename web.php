<?php

use app\modules\bookshop\interfaces\BookInterface;
use app\modules\bookshop\interfaces\BookServiceInterface;

require __DIR__ . '/globals.php';

$config = [

    'container' => [
        'definitions' => [
            BookServiceInterface::class => [
                'class' => BookService::class
            ],
            BookInterface::class => [
                'class' => Book::class
//                'class' => BookAdapter::class
            ],
        ]
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;