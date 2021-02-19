<?php
// Aside menu
return [

    'items' => [
        [
            'section' => 'Dashboard',
        ],
        [
            'title' => 'Home',
            'root' => false,
            'icon' => 'flaticon-home-2', // flaticon-*
            'page' => '/home',
            'new-tab' => false,
        ],
        [
            'title' => 'Tasks',
            'root' => false,
            'icon' => 'flaticon-interface-10', // flaticon-*
            'page' => '/tasks',
            'new-tab' => false,
        ],
        [
            'title' => 'Categories',
            'root' => false,
            'new-tab' => false,
            'admin' => true,
            'icon' => 'flaticon-list',
            'submenu' => [
                [
                    'title' => 'All',
                    'page' => '/categories',
                    'admin' => true,
                    'icon' => 'flaticon-list-2',
                ],
                [
                    'title' => 'Proposed',
                    'page' => '/categories/proposed',
                    'admin' => true,
                    'icon' => 'flaticon-doc',
                ],
            ]
        ],
        [
            'title' => 'Users',
            'root' => false,
            'icon' => 'flaticon-users', // flaticon-*
            'page' => '/users',
            'new-tab' => false,
            'admin' => true
        ],
        [
            'section' => 'Account & Privacy',
        ],
        [
            'title' => 'Profile',
            'root' => false,
            'icon' => 'flaticon-profile-1', // flaticon-*
            'page' => '/profile',
            'new-tab' => false
        ],
        [
            'title' => 'Security',
            'root' => false,
            'icon' => 'flaticon-lock', // flaticon-*
            'page' => '/security',
            'new-tab' => false
        ],
        [
            'section' => 'Extra',
        ],
        [
            'title' => 'Error Log',
            'root' => false,
            'icon' => 'flaticon-exclamation', // flaticon-*
            'page' => '/error_log',
            'new-tab' => false,
            'admin' => true
        ],
    ]

];