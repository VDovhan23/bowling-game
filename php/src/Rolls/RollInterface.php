<?php

declare(strict_types=1);

namespace swkberlin\Rolls;

interface RollInterface
{
    public function bonus(int $roll): int;
}