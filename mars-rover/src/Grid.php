<?php
declare(strict_types=1);

namespace Gquemener\MarsRover;

interface Grid
{
    public function turnRight(): self;

    public function turnLeft(): self;

    public function move(): self;

    public function withAddedObstacle(Position $position): self;

    public function asString();
}
