<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

class MarsRover
{
    private const TURN_RIGHT = 'R';
    private const TURN_LEFT = 'L';
    private const MOVE = 'M';

    private bool $collisionDetected = false;

    public function __construct(
        private Grid $grid
    ) {
    }

    public function execute(string $path): void
    {
        foreach (str_split($path, 1) as $command) {
            try {
                $this->grid = match ($command) {
                    self::TURN_RIGHT => $this->grid->turnRight(),
                    self::TURN_LEFT => $this->grid->turnLeft(),
                    self::MOVE => $this->grid->move(),
                    default => $this->grid
                };
            } catch (ObstacleCollisionDetected) {
                $this->collisionDetected = true;
            }
        }
    }

    public function position(): string
    {
        return ($this->collisionDetected ? 'O:' : '') . $this->grid->asString();
    }
}
