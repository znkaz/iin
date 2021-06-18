<?php

namespace ZnKaz\Iin\Domain\Entities;

class DateEntity
{

    private $year;
    private $decade;
    private $month;
    private $day;
    private $epoch = 0;

    public function getYear(): int
    {
        return $this->epoch + $this->decade;
    }

    public function setYear(int $year): void
    {

    }

    public function getDecade(): int
    {
        return $this->decade;
    }

    public function setDecade(int $decade): void
    {
        $this->decade = $decade;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function getEpoch(): int
    {
        return $this->epoch;
    }

    public function setEpoch(int $epoch): void
    {
        $this->epoch = $epoch;
    }
}
