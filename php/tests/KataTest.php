<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Game;

require __DIR__ . '/../vendor/autoload.php';

class KataTest extends TestCase
{


    public function testDummy()
    {
        $kata = new Game();
        $this->assertTrue(false);
    }

    public function testNotFailing()
    {
        $this->assertTrue(true);
    }

}
