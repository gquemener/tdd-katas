<?php

declare(strict_types=1);

namespace Diversion;

final class Diversion
{
    public function countFor(int $n): int
    {
        return match ($n) {
            0 => 0,
            1 => 2,
            2 => 3,
            default => $this->countFor($n - 1) + $this->countFor($n - 2)
        };
    }
}
