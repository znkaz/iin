<?php

namespace ZnKaz\Iin\Domain\Libs\Parsers;

use ZnKaz\Iin\Domain\Entities\BaseEntity;
use ZnKaz\Iin\Domain\Entities\IndividualEntity;
use ZnKaz\Iin\Domain\Enums\SexEnum;
use ZnKaz\Iin\Domain\Helpers\CenturyHelper;

class IndividualParser implements ParserInterface
{

    private $dateParser;

    public function __construct()
    {
        $this->dateParser = new IndividualDateParser();
    }

    public function parse(string $value): BaseEntity
    {
        $dateEntity = $this->dateParser->parse($value);

        $individualEntity = new IndividualEntity();
        $individualEntity->setValue($value);
        $individualEntity->setSex(CenturyHelper::getSexFromCentury(substr($value, 6, 1)));
        $individualEntity->setCentury(substr($value, 6, 1));
        $individualEntity->setBirthday($dateEntity);
        $individualEntity->setSerialNumber(substr($value, 7, 4));
        $individualEntity->setCheckSum(substr($value, 11, 1));
        return $individualEntity;
    }
}
