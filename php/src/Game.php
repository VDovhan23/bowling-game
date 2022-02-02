<?php

namespace swkberlin;

class Game
{
    const GAME_FRAMES = 10;

    protected array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {

    }
}