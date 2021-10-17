<?php

declare(strict_types=1);

namespace Gquemener\MarsRover\Orientation;

use Gquemener\MarsRover\Orientation;

final class South implements Orientation
{
    public function turnRight(): Orientation
    {
        return new West();
    }

    public function turnLeft(): Orientation
    {
        return new East();
    }

    public function asString(): string
    {
        return 'S';
    }
}
