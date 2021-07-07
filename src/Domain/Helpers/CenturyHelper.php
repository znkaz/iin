<?php

namespace ZnKaz\Iin\Domain\Helpers;

use ZnKaz\Iin\Domain\Enums\SexEnum;

class CenturyHelper
{

    public static function getSexFromCentury(int $century): string
    {
        return !empty($century % 2) ? SexEnum::MALE : SexEnum::FEMALE;
    }

    public static function getEpochFromCentury(int $century): int
    {
        $residue = $century % 2;
        if ($residue == 0) {
            $century--;
        }
        $centuryDiv = floor($century / 2);
        return $centuryDiv + 18;
    }

    public static function forgeCentury(string $sex, int $epoch): int
    {
        /*
        1 - для мужчин, родившихся в 19 веке
        2 - для женщин, родившихся в 19 веке
        3 - для мужчин, родившихся в 20 веке
        4 - для женщин, родившихся в 20 веке
        5 - для мужчин, родившихся в 21 веке
        6 - для женщин, родившихся в 21 веке
        */
        $sexInt = $sex == SexEnum::MALE ? 1 : 0;
        return ($epoch - 18) * 2 - $sexInt;
    }
}
