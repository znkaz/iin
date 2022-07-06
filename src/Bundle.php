<?php

namespace ZnKaz\Iin;

use ZnCore\Bundle\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function symfonyRpc(): array
    {
        return [
            __DIR__ . '/Rpc/config/routes.php',
        ];
    }

    public function i18next(): array
    {
        return [
            'kaz.iin' => 'vendor/znkaz/iin/src/Domain/i18next/__lng__/__ns__.json',
        ];
    }
}
