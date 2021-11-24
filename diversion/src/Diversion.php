<?php

declare(strict_types=1);

namespace Diversion;

final class Diversion
{
    public function countFor(int $n): int
    {
        /**
         * This sequence does not follow Fibonacci sequence as defined on https://oeis.org/A000045
         * at the beginning but converge after a few iteration
         */
        return match ($n) {
            0 => 0,
            1 => 2,
            2 => 3,
            default => $this->countFor($n - 1) + $this->countFor($n - 2)
        };
    }
}
