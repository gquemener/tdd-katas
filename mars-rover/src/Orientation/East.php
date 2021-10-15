<?php

declare(strict_types=1);

namespace Gquemener\MarsRover\Orientation;

use Gquemener\MarsRover\Orientation;

final class East implements Orientation
{
    public function turnRight(): Orientation
    {
        return new South();
    }

    public function turnLeft(): Orientation
    {
        return new North();
    }

    public function asString(): string
    {
        return 'E';
    }
}
