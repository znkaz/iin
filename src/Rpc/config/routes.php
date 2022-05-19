<?php

use ZnKaz\Iin\Domain\Enums\Rbac\SecurityPermissionEnum;
use ZnKaz\Iin\Rpc\Controllers\RestorePasswordController;
use ZnKaz\Iin\Rpc\Controllers\UpdatePasswordController;

return [
    [
        'method_name' => 'iin.getInfo',
        'version' => '1',
        'is_verify_eds' => false,
        'is_verify_auth' => false,
        'permission_name' => \ZnKaz\Iin\Domain\Enums\Rbac\IinPermissionEnum::GET_INFO,
        'handler_class' => \ZnKaz\Iin\Rpc\Controllers\IinController::class,
        'handler_method' => 'getInfo',
        'status_id' => 100,
        'title' => null,
        'description' => null,
    ],
];
