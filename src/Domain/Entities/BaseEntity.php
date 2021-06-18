<?php

namespace ZnKaz\Iin\Domain\Entities;

class BaseEntity
{

    protected $value;
    protected $serialNumber;
    protected $checkSum;
    
    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getSerialNumber(): int
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(int $serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }

    public function getCheckSum(): int
    {
        return $this->checkSum;
    }

    public function setCheckSum(int $checkSum): void
    {
        $this->checkSum = $checkSum;
    }
}
