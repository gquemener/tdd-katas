<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

class MarsRover
{
    private const TURN_RIGHT = 'R';
    private const TURN_LEFT = 'L';
    private const MOVE = 'M';

    public function __construct(
        private Grid $grid
    ) {
    }

    public function execute(string $path): string
    {
        foreach (str_split($path, 1) as $command) {
            $this->grid = match ($command) {
                self::TURN_RIGHT => $this->grid->turnRight(),
                self::TURN_LEFT => $this->grid->turnLeft(),
                self::MOVE => $this->grid->move(),
                default => $this->grid
            };
        }

        return sprintf('%s:%s', $this->grid->position(), $this->grid->orientation());
    }
}
