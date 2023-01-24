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
                'class' => Book::class // Can be switched to this one in orderr to use the Book model and its CRUD methods
//                'class' => BookAdapter::class // Can be switched to this one in order to use the adapter which will call the Files model CRUD methods
            ],
        ]
    ]
];

return $config;
