<?php

namespace ZnKaz\Iin\Domain\Enums\Rbac;

use ZnCore\Base\Enum\Interfaces\GetLabelsInterface;

class IinPermissionEnum implements GetLabelsInterface
{

    const GET_INFO = 'oIinGetInfo';

    public static function getLabels()
    {
        return [
            self::GET_INFO => 'Получить инфо об ИИН',
        ];
    }
}