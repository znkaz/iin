<?php

namespace ZnKaz\Iin\Domain\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use ZnLib\I18Next\Facades\I18Next;
use ZnDomain\Validator\Exceptions\UnprocessibleEntityException;
use ZnKaz\Iin\Domain\Helpers\IinParser;
use Exception;

class IinValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Iin) {
            throw new UnexpectedTypeException($constraint, Iin::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($value, 'string');

            // separate multiple types using pipes
            // throw new UnexpectedValueException($value, 'string|int');
        }

        try {
            $iinEntity = IinParser::parse($value);
        } catch (Exception $e) {
            $message = I18Next::t('kaz.iin', 'main.message.not_valid');
            if($message) {
                $message = $message;
            } else {
                $message = $e->getMessage();
            }
            $this->context->buildViolation($message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
