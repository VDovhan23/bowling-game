<?php

declare(strict_types =1);

namespace swkberlin;

use swkberlin\Calculation\CalculationInterface;
use swkberlin\Rolls\SpareRoll;
use swkberlin\Rolls\StrikeRoll;

class Game
{
    public function __construct(private CalculationInterface $calculator)
    {
    }

    const FRAMES = 10;

    public function roll(int $skittles): void
    {
        $this->calculator->rolls[] = $skittles;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES) as $frame){
            if ($this->isStrikeRoll($roll)){
                $strikeRoll = new StrikeRoll($this->calculator);

                $score += $this->calculator->throwCount($roll) + $strikeRoll->bonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->calculator->calculateFrameScore($roll);

            if ($this->isSpareRoll($roll)) {

                $spareRoll = new SpareRoll($this->calculator);

                $score += $spareRoll->bonus($roll);
            }

            $roll+= 2;

        }

        return $score;
    }


    protected function isStrikeRoll(int $roll): bool
    {
        return $this->calculator->throwCount($roll) === 10;
    }

    protected function isSpareRoll(int $roll): bool
    {
        return $this->calculator->calculateFrameScore($roll) === 10;
    }

}
