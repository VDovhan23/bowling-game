<?php

namespace swkberlin;

class Game
{
    const FRAMES = 10;

    protected array $rolls = [];

    public function roll(int $skittles): void
    {
        $this->rolls[] = $skittles;
    }


    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES) as $frame){
            if ($this->isStrikeRoll($roll)){
                $score += $this->throwCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->calculateFrameScore($roll);

            if ($this->isStrikeRoll($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll+= 2;

        }

        return $score;
    }

    protected function throwCount(int $roll): int
    {
        return $this->rolls[$roll];
    }

    protected function calculateFrameScore(int $roll): int
    {
        return $this->throwCount($roll) + $this->throwCount($roll + 1);
    }


    protected function isStrikeRoll(int $roll): bool
    {
        return $this->throwCount($roll) === 10;
    }

    protected function isSpareRoll(int $roll): bool
    {
        return $this->calculateFrameScore($roll) === 10;
    }


    protected function spareBonus(int $roll): int
    {
        return $this->throwCount($roll + 2);
    }

    protected function strikeBonus(int $roll): int
    {
        return $this->throwCount($roll + 1) + $this->throwCount($roll + 2);
    }

}
