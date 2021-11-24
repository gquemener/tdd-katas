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
        $result = 0;
        foreach (range(0, (2**$n)-1) as $value) {
            if (!str_contains(decbin($value), '11')) {
                ++$result;
            }
        }

        return $result;
    }
}
