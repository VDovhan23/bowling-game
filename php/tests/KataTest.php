<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Calculation\Calculator;
use swkberlin\Game;

require __DIR__ . '/../vendor/autoload.php';

class KataTest extends TestCase
{

    function test_is_a_perfect_game()
    {
        $game = new Game(new Calculator());

        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }

    function test_is_a_bad_game()
    {
        $game = new Game(new Calculator());

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }
}
