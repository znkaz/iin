<?php

namespace ZnKaz\Iin;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function symfonyRpc(): array
    {
        return [
            __DIR__ . '/Rpc/config/routes.php',
        ];
    }
}
