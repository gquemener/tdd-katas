<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;

final class Grid
{
    private int $maxX;
    private int $maxY;
    private Orientation $orientation;

    private int $x = 0;
    private int $y = 0;

    public function __construct(
        int $width,
        int $height,
    ) {
        $this->maxX = $width - 1;
        $this->maxY = $height - 1;
        $this->orientation = new North();
    }

    public function position(): string
    {
        return sprintf('%d:%d', $this->x, $this->y);;
    }

    public function orientation(): string
    {
        return $this->orientation->asString();
    }

    public function turnRight(): void
    {
        $this->orientation = $this->orientation->turnRight();
    }

    public function turnLeft(): void
    {
        $this->orientation = $this->orientation->turnLeft();
    }

    public function move(): void
    {
        switch ($this->orientation::class) {
            case North::class:
                ++$this->y;
                break;

            case East::class:
                ++$this->x;
                break;

            case South::class:
                --$this->y;
                break;

            case West::class:
                --$this->x;
                break;
        }

        if ($this->x < 0) {
            $this->x = $this->maxX;
        }

        if ($this->x > $this->maxX) {
            $this->x = 0;
        }

        if ($this->y < 0) {
            $this->y = $this->maxY;
        }

        if ($this->y > $this->maxY) {
            $this->y = 0;
        }
    }
}
