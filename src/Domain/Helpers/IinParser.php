<?php

namespace ZnKaz\Iin\Domain\Helpers;

use ZnKaz\Iin\Domain\Entities\BaseEntity;
use ZnKaz\Iin\Domain\Enums\TypeEnum;
use ZnKaz\Iin\Domain\Exceptions\BadTypeException;
use ZnKaz\Iin\Domain\Libs\Parsers\IndividualParser;
use ZnKaz\Iin\Domain\Libs\Parsers\JuridicalParser;
use ZnKaz\Iin\Domain\Libs\Parsers\ParserInterface;
use ZnKaz\Iin\Domain\Libs\Validator;

class IinParser
{

    public static function parse(string $value): BaseEntity
    {
        $validator = new Validator();
        $validator->validate($value);
        $type = self::getType($value);
        $parser = self::getParserByType($type);
        return $parser->parse($value);
    }

    private static function getParserByType(string $type): ParserInterface
    {
        if ($type == TypeEnum::INDIVIDUAL) {
            return new IndividualParser();
        } elseif ($type == TypeEnum::JURIDICAL) {
            return new JuridicalParser();
        }
    }

    private static function getType(string $value): string
    {
        $typeMarker = $value[4];
        if (in_array($typeMarker, [0, 1, 2, 3])) {
            return TypeEnum::INDIVIDUAL;
        }
        if (in_array($typeMarker, [4, 5, 6])) {
            return TypeEnum::JURIDICAL;
        }
        throw new BadTypeException('Error type');
    }
}
