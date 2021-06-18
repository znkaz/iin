<?php

namespace ZnKaz\Iin\Domain\Libs\Parsers;

use ZnKaz\Iin\Domain\Entities\BaseEntity;

interface ParserInterface
{

    public function parse(string $value): BaseEntity;
}
