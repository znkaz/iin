<?php

namespace ZnKaz\Iin\Domain\Constraints;

use Symfony\Component\Validator\Constraint;

class Iin extends Constraint
{

    public $message = 'IIN "{{ value }}" is not valid';
}
