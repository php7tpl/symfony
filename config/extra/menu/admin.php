<?php

return [
    [
        'label' => 'Widgets',
        'url' => '../widgets.html',
        'icon' => 'nav-icon fas fa-th',
        'badge' => 'New',
    ],
    [
        'label' => 'Dashboard',
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'items' => [
            [
                'label' => 'Dashboard v1',
                'url' => '',
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'label' => 'Dashboard <u>v2</u>',
                'encode' => false,
                'url' => '',
                'icon' => 'far fa-circle nav-icon',
                'active' => true,
            ],
            [
                'label' => 'Dashboard v3',
                'url' => '',
                'icon' => 'far fa-circle nav-icon',
                'visible' => false,
            ],
        ],
    ],
    [
        'label' => 'Layout Options',
        'icon' => 'nav-icon fas fa-copy',
        'badge' => '6',
        'items' => [
            [
                'label' => 'Top Navigation',
                'url' => '',
                'icon' => 'far fa-circle nav-icon',
            ],
            [
                'label' => 'Boxed',
                'url' => '',
                'icon' => 'far fa-circle nav-icon',
            ],
        ],
    ],
];
