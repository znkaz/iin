<?php

namespace ZnKaz\Iin\Domain\Entities;

class JuridicalEntity extends BaseEntity
{

    private $type;
    private $part;
    private $registrationDate;

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getPart(): int
    {
        return $this->part;
    }

    public function setPart(int $part): void
    {
        $this->part = $part;
    }

    public function getRegistrationDate(): DateEntity
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(DateEntity $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }
}
