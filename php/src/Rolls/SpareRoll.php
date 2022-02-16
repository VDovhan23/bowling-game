<?php

namespace swkberlin\Rolls;

use swkberlin\Calculation\CalculationInterface;

class SpareRoll implements RollInterface
{
    public function __construct(private CalculationInterface $calculator)
    {
    }

    public function bonus(int $roll): int
    {
        return $this->calculator->throwCount($roll + 2);
    }
}