<?php

/** TODO
 * Add permissions for profile
 */

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d,m',
            'settings' => 'c,r,u,d,m',
            'carousel' => 'c,r,u,d,m',
            'component' => 'c,r,u,d,m',
            'asset' => 'c,r,u,d,m',
            'post' => 'c,r,u,d,m',
        ],
        'user' => [
            'users' => 'r,u',
            'carousel' => 'r'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'm' => 'menu'
    ]
];
