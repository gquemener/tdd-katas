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

    public function turnRight(): self
    {
        $self = clone $this;
        $self->orientation = $this->orientation->turnRight();

        return $self;
    }

    public function turnLeft(): self
    {
        $self = clone $this;
        $self->orientation = $this->orientation->turnLeft();

        return $self;
    }

    public function move(): self
    {
        $self = clone $this;

        switch ($self->orientation::class) {
            case North::class:
                ++$self->y;
                break;

            case East::class:
                ++$self->x;
                break;

            case South::class:
                --$self->y;
                break;

            case West::class:
                --$self->x;
                break;
        }

        if ($self->x < 0) {
            $self->x = $self->maxX;
        }

        if ($self->x > $self->maxX) {
            $self->x = 0;
        }

        if ($self->y < 0) {
            $self->y = $self->maxY;
        }

        if ($self->y > $self->maxY) {
            $self->y = 0;
        }

        return $self;
    }
}
