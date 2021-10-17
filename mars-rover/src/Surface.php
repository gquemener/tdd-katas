<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;

final class Surface implements Grid
{
    private Orientation $orientation;
    private Position $position;
    private array $obstacles = [];

    public function __construct(
        private int $width,
        private int $height,
    ) {
        $this->orientation = new North();
        $this->position = Position::at(0, 0);
    }

    public function asString(): string
    {
        return sprintf('%s:%s', $this->position->asString(), $this->orientation->asString());
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

        $newPosition = $this
            ->position
            ->move($this->orientation)
            ->wrapX($this->width)
            ->wrapY($this->height)
        ;

        foreach ($self->obstacles as $obstacle) {
            if ($obstacle->equals($newPosition)) {
                throw new ObstacleCollisionDetected();
            }
        }

        $self->position = $newPosition;

        return $self;
    }

    public function withAddedObstacle(Position $position): self
    {
        $self = clone $this;
        $self->obstacles[] = $position;

        return $self;
    }
}
