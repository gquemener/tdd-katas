<?php

declare(strict_types=1);

namespace Gquemener\MarsRover\Orientation;

use Gquemener\MarsRover\Orientation;

final class North implements Orientation
{
    public function turnRight(): Orientation
    {
        return new East();
    }

    public function turnLeft(): Orientation
    {
        return new West();
    }

    public function asString(): string
    {
        return 'N';
    }
}
