<?php

$EM_CONF['cdn_utils'] = [
    'title' => 'CDN Utilities',
    'description' => 'Shows detected client IP and X-Forwarded-For proxies in the backend system information menu.',
    'category' => 'be',
    'author' => 'MFD',
    'author_email' => 'info@marketing-factory.de',
    'state' => 'stable',
    'version' => '0.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
