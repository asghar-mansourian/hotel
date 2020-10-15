<?php
return [
    'admin' =>[
        'panel' => [
            'title' => 'Dashboard'
        ],
        'admin' => [
            'title' => 'admin',
            'index' => [
                'title' => 'Show Admins',

                'table' => [
                    'header' => 'Admins List',
                ],
            ],
            'message' => [
                'create' => 'Admin Created Successful',
                'update' => 'Admin Updated Successful',
                'delete' => 'Admin Deleted Successful',
            ]
        ],
        'user' => [
            'title' => 'Users',
            'index' => [
                'title' => 'Show Users',

                'table' => [
                    'header' => 'Users List',
                ],
            ],
            'create' => [
                'title' => 'Create User',
            ],
            'message' => [
                'create' => 'User Created Successful',
                'update' => 'User Updated Successful',
                'delete' => 'User Deleted Successful',
            ]
        ],
        'country' => [
            'title' => 'Countries',
            'index' => [
                'title' => 'Show Countries',

                'table' => [
                    'header' => 'Countries List',
                ],
            ],
            'create' => [
                'title' => 'Create Country',
            ],
            'message' => [
                'create' => 'Country Created Successful',
                'update' => 'Country Updated Successful',
                'delete' => 'Country Deleted Successful',
            ]
        ],
        'region' => [
            'title' => 'Regions',
            'index' => [
                'title' => 'Show Regions',

                'table' => [
                    'header' => 'Regions List',
                ],
            ],
            'create' => [
                'title' => 'Create Region',
            ],
            'message' => [
                'create' => 'Region Created Successful',
                'update' => 'Region Updated Successful',
                'delete' => 'Region Deleted Successful',
            ]
        ],
    ],
    'other' => [
        'search' => 'search',
        'edit' => 'edit',
        'delete' => 'delete',
        'show' => 'show',
        'name' => 'name',
        'email' => 'email',
        'family' => 'family',
        'password' => 'password',
        'status' => 'status',
        'id' => 'id',
        'actions' => 'actions',
        'active' => 'active',
        'deactive' => 'deactive',
    ]
];
