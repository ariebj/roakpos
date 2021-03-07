<?php

return [
    'name' => 'ROAKPOS',
    'manifest' => [
        'name' => env('APP_NAME'),
        'short_name' => 'ROAKPOS',
        'start_url' => '/roakpos/public',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => '/roakpos/public/storage/logos/logo-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/roakpos/public/storage/logos/logo-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/roakpos/public/storage/logos/logo-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/roakpos/public/storage/logos/logo-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/roakpos/public/roakpos/public/storage/logos/logo-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/roakpos/public/storage/logos/logo-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/roakpos/public/storage/logos/logo-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/roakpos/public/storage/logos/logo-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/roakpos/public/storage/logos/splash-640x1136.png',
            '750x1334' => '/roakpos/public/storage/logos/splash-750x1334.png',
            '828x1792' => '/roakpos/public/storage/logos/splash-828x1792.png',
            '1125x2436' => '/roakpos/public/storage/logos/splash-1125x2436.png',
            '1242x2208' => '/roakpos/public/storage/logos/splash-1242x2208.png',
            '1242x2688' => '/roakpos/public/storage/logos/splash-1242x2688.png',
            '1536x2048' => '/roakpos/public/storage/logos/splash-1536x2048.png',
            '1668x2224' => '/roakpos/public/storage/logos/splash-1668x2224.png',
            '1668x2388' => '/roakpos/public/storage/logos/splash-1668x2388.png',
            '2048x2732' => '/roakpos/public/storage/logos/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'ROAKPOS shortcut 1 icon',
                'url' => '/roakpos/public/storage/logos/logo-72x72.png',
                'icons' => [
                    "src" => "/roakpos/public/storage/logos/logo-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'ROAKPOS shortcut 1 icon',
                'url' => '/roakpos/public/storage/logos/logo-96x96.png'
            ]
        ],
        'custom' => []
    ]
];
