<?php

namespace swkberlin\Calculation;

interface CalculationInterface
{
    public function throwCount(int $roll): int;

    public function calculateFrameScore(int $roll): int;
}