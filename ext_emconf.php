<?php

$EM_CONF['cdn_utils'] = [
    'title' => 'CDN Utilities',
    'description' => 'Shows detected client IP and X-Forwarded-For proxies in the backend system information menu.',
    'category' => 'be',
    'author' => 'MFD',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
