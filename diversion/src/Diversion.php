<?php

declare(strict_types=1);

namespace Diversion;

final class Diversion
{
    public function countFor(int $n): int
    {
        if (0 === $n) {
            return 0;
        }

        if (1 === $n) {
            return 2;
        }

        if (2 === $n) {
            return 3;
        }

        return $this->countFor($n - 1) + $this->countFor($n - 2);
    }
}
