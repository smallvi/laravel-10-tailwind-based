<?php

return [
    'subdomain_mode' => env('SUBDOMAIN_MODE', false),

    'route' => [
        'web' => [
            'domain' => env('MAIN_DOMAIN'),
            'file' => base_path('routes/web.php'),
            'name' => '',
            'prefix' => '',
            'namespace' => ''
        ],

        'admin' => [
            'domain' =>  'admin.' . env('MAIN_DOMAIN'),
            'file' => base_path('routes/admin.php'),
            'name' => 'admin' . '.',
            'prefix' => 'admin',
            'namespace' => 'Admin'
        ],
    ]

];
