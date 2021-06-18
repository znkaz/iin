<?php

namespace ZnKaz\Iin\Domain\Libs\Parsers;

use ZnKaz\Iin\Domain\Entities\DateEntity;

interface DateParserInterface
{

    public function parse(string $value): DateEntity;
}
