<?php

namespace ZnKaz\Iin\Domain\Helpers;

use ZnCore\Base\Helpers\StringHelper;
use ZnKaz\Iin\Domain\Entities\IndividualEntity;
use ZnKaz\Iin\Domain\Libs\CheckSum;

class IinHelper
{

    public static function entityToString(IndividualEntity $individualEntity): string
    {
        $iin =
            StringHelper::fill($individualEntity->getBirthday()->getDecade(), 2, '0', 'before') .
            StringHelper::fill($individualEntity->getBirthday()->getMonth(), 2, '0', 'before') .
            StringHelper::fill($individualEntity->getBirthday()->getDay(), 2, '0', 'before') .
            $individualEntity->getCentury() .
            StringHelper::fill($individualEntity->getSerialNumber(), 4, '0', 'before');
        $checkSum = new CheckSum();
        $checkSumEntity = $checkSum->generateSum($iin);
        $iin .= $checkSumEntity->getSum();
        return $iin;
    }
}
