<?php

namespace ZnKaz\Iin\Domain\Enums;

use ZnCore\Enum\Interfaces\GetLabelsInterface;

class JuridicalPartEnum implements GetLabelsInterface
{

    const HEAD = 0;
    const BRANCH = 1;
    const REPRESENTATION = 2;
    const FARM_OPERATING = 3;

    public static function getLabels()
    {
        return [
            self::HEAD => 'головного подразделения юридического лица или ИП(С)',
            self::BRANCH => 'филиала юридического лица или ИП(С)',
            self::REPRESENTATION => 'представительства юридического лица или ИП(С)',
            self::FARM_OPERATING => 'крестьянское (фермерское) хозяйство, осуществляющее деятельность на основе совместного предпринимательства',
        ];
    }
}
