<?php

declare(strict_types=1);

namespace GildasQ;

final class StringSummer
{
    public function sum(string $a, string $b): string
    {
        return (string) ($this->toNatural($a) + $this->toNatural($b));
    }

    private function toNatural(string $x): int
    {
        if (0 === preg_match('/^[0-9]*$/', $x)) {
            return 0;
        }

        return (int) $x;
    }
}
