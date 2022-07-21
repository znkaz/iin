<?php

use ZnKaz\Iin\Domain\Enums\Rbac\IinPermissionEnum;
use ZnUser\Rbac\Domain\Enums\Rbac\SystemRoleEnum;

return [
    'roleEnums' => [
        SystemRoleEnum::class,
    ],
    'permissionEnums' => [
        IinPermissionEnum::class,
    ],
    'inheritance' => [
        SystemRoleEnum::GUEST => [
            IinPermissionEnum::GET_INFO,
        ],
        SystemRoleEnum::USER => [

        ],
    ],
];
