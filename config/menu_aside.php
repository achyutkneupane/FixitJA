<?php
// Aside menu
return [

    'items' => [
        /* Section Example
        [
            'section' => 'Admin Panel',
        ], */


        // Links
        [
            'title' => 'Categories',
            'root' => false,
            'icon' => 'flaticon-list', // flaticon-*
            'page' => '/admin/category',
            'new-tab' => false,
            'admin' => true
        ],
        [
            'title' => 'Users',
            'root' => false,
            'icon' => 'flaticon-users', // flaticon-*
            'page' => '/admin/users',
            'new-tab' => false,
            'admin' => true
        ],
        [
            'title' => 'Tasks',
            'root' => false,
            'icon' => 'flaticon-interface-10', // flaticon-*
            'page' => '/admin/task',
            'new-tab' => false,
        ]
    ]

];