<?php

namespace ZnKaz\Iin\Domain\Entities;

class CheckSumEntity
{

    private $sum;
    private $sequence;

    public function getSum(): int
    {
        return $this->sum;
    }

    public function setSum(int $sum): void
    {
        $this->sum = $sum;
    }

    public function getSequence(): array
    {
        return $this->sequence;
    }

    public function setSequence(array $sequence): void
    {
        $this->sequence = $sequence;
    }
}
