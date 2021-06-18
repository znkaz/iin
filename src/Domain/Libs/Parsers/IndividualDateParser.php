<?php

namespace ZnKaz\Iin\Domain\Libs\Parsers;

use ZnKaz\Iin\Domain\Entities\DateEntity;
use ZnKaz\Iin\Domain\Exceptions\BadDateException;

class IndividualDateParser implements DateParserInterface
{

    public function parse(string $value): DateEntity
    {
        $smallYear = substr($value, 0, 2);
        $dateEntity = new DateEntity();

        $century = substr($value, 6, 1);
        $epoch = $this->getEpoch($century);
        $dateEntity->setDecade($smallYear);
        $dateEntity->setMonth(substr($value, 2, 2));
        $dateEntity->setDay(substr($value, 4, 2));
        $dateEntity->setEpoch($epoch);

        $this->validateDate($dateEntity);
        return $dateEntity;
    }
    
    private function validateDate(DateEntity $dateEntity): void
    {
        $isValid = checkdate($dateEntity->getMonth(), $dateEntity->getDay(), $dateEntity->getYear());
        if (!$isValid) {
            throw new BadDateException();
        }
    }

    private function getEpoch(int $century): int
    {
        $residue = $century % 2;
        if ($residue == 0) {
            $century--;
        }
        $centuryDiv = floor($century / 2);
        return ($centuryDiv + 18) * 100;
    }
}
