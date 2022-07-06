<?php

namespace ZnKaz\Iin\Domain\Enums;

use ZnCore\Enum\Interfaces\GetLabelsInterface;

class JuridicalTypeEnum implements GetLabelsInterface
{

    const INDIVIDUAL_RESIDENT = 4;
    const JURIDICAL_NON_RESIDENT = 5;
    const INDIVIDUAL_ENTREPRENEUR = 6;

    public static function getLabels()
    {
        return [
            self::INDIVIDUAL_RESIDENT => 'для юридических лиц-резидентов',
            self::JURIDICAL_NON_RESIDENT => 'для юридических лиц-нерезидентов',
            self::INDIVIDUAL_ENTREPRENEUR => 'для ИП(С)',
        ];
    }
}
