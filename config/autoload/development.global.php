<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'host' => '127.0.0.1',
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'portal.dev',
                ]
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            // Template map
        ],
        'template_path_stack' => [
            __DIR__ . '/../../view',
        ],
    ],
];
