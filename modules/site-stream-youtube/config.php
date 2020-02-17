<?php

return [
    '__name' => 'site-stream-youtube',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/site-stream-youtube.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'app/site-stream-youtube' => ['install','remove'],
        'modules/site-stream-youtube' => ['install','update','remove'],
        'theme/site/stream/youtube' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'site' => NULL
            ],
            [
                'site-meta' => NULL
            ],
            [
                'stream-youtube' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteStreamYoutube\\Controller' => [
                'type' => 'file',
                'base' => 'app/site-stream-youtube/controller'
            ],
            'SiteStreamYoutube\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-stream-youtube/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteStreamYoutube' => [
                'path' => [
                    'value' => '/stream/youtube'
                ],
                'method' => 'GET',
                'handler' => 'SiteStreamYoutube\\Controller\\Stream::single'
            ]
        ]
    ],
    'libFormatter' => [
        'formats' => [
            'stream-youtube' => [
                'page' => [
                    'type' => 'router',
                    'router' => [
                        'name' => 'siteStreamYoutube',
                        'params' => []
                    ]
                ]
            ]
        ]
    ]
];