<?php

declare(strict_types =1);

namespace swkberlin\Calculation;

class Calculator implements CalculationInterface
{
    public array $rolls = [];

    public function throwCount(int $roll): int
    {
        return $this->rolls[$roll];
    }

    public function calculateFrameScore(int $roll): int
    {
        return $this->throwCount($roll) + $this->throwCount($roll + 1);
    }
}