<?php

/** TODO
 * Add permissions for profile
 */

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'carousel' => 'c,r,u,d'
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
        'd' => 'delete'
    ]
];
