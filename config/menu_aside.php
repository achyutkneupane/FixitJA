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
                    'icon' => 'flaticon2-writing',
                ],
                [
                    'title' => 'Rejected',
                    'page' => '/categories/reject',
                    'admin' => true,
                    'icon' => 'flaticon-interface-4',
                ],
            ]
        ],
        [
            'title' => 'Users',
            'root' => false,
            // 'icon' => 'flaticon-users', // flaticon-*
            'page' => '/users',
            'new-tab' => false,
            'admin' => true,
            'icon' => 'flaticon-users',
            'submenu' => [
                [
                    'title' => 'All',
                    'page' => '/users/activeUsers',
                    'admin' => true,
                    'icon' => 'flaticon-profile',
                ],
                [
                    'title' => 'New',
                    'page' => '/users/newUsers',
                    'admin' => true,
                    'icon' => 'flaticon-user-add',
                ],
                [
                    'title' => 'Applicants',
                    'page' => '/users/applicantUsers',
                    'admin' => true,
                    'icon' => 'flaticon2-writing',
                ],
                [
                    'title' => 'Rejected',
                    'page' => '/users/rejectUsers',
                    'admin' => true,
                    'icon' => 'flaticon-interface-4',
                ]
            ]
        ],
        [
            'title' => 'Reviews',
            'root' => false,
            'icon' => 'flaticon-customer', // flaticon-*
            'page' => '/review',
            'new-tab' => false,
        ],
        [
            'title' => 'Referrals',
            'root' => false,
            'icon' => 'flaticon-network', // flaticon-*
            'page' => '/referral',
            'new-tab' => false,
        ],
        [
            'title' => 'Subscriptions',
            'root' => false,
            'icon' => 'flaticon-user-add', // flaticon-*
            'page' => '/subscription',
            'new-tab' => false
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
            'admin' => true
        ],
        [
            'title' => 'Error Log',
            'root' => false,
            'icon' => 'flaticon-exclamation', // flaticon-*
            'page' => '/error_log',
            'new-tab' => false,
            'admin' => true
        ],
        [
            'section' => 'Settings',
            'admin' => true
        ],
        [
            'title' => 'Site Setting',
            'root' => false,
            'icon' => 'flaticon-settings-1', // flaticon-*
            'page' => '/setting/statics',
            'new-tab' => false,
            'admin' => true
        ],
    ]

];