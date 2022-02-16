<?php

declare(strict_types =1);

namespace swkberlin\Rolls;

use swkberlin\Calculation\CalculationInterface;

class StrikeRoll implements RollInterface
{
    public function __construct(private CalculationInterface $calculator)
    {
    }

    public function bonus(int $roll): int
    {
        return $this->calculator->throwCount($roll + 1) + $this->calculator->throwCount($roll + 2);
    }

}