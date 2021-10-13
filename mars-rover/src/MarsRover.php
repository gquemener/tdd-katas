<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

class MarsRover
{
    private int $orientation = 0;
    private int $x = 0;
    private int $y = 0;

    private const TURN_RIGHT = 'R';
    private const TURN_LEFT = 'L';
    private const MOVE = 'M';

    private const NORTH = 'N';
    private const EAST = 'E';
    private const SOUTH = 'S';
    private const WEST = 'W';
    private const ORIENTATIONS = [self::NORTH, self::EAST, self::SOUTH, self::WEST];

    public function execute(string $path): string
    {
        foreach (str_split($path, 1) as $command) {
            $this->handle($command);
        }

        return sprintf('%d:%d:%s', $this->x, $this->y, self::ORIENTATIONS[$this->orientation]);
    }

    private function handle(string $command): void
    {
        switch ($command) {
            case self::TURN_RIGHT:
            case self::TURN_LEFT:
                $this->turn(self::TURN_RIGHT === $command);
                break;

            case self::MOVE:
                $this->move(self::ORIENTATIONS[$this->orientation]);
            break;
        }
    }

    private function turn(bool $right): void
    {
        if ($right) {
            ++$this->orientation;
        } else {
            --$this->orientation;
        }

        if ($this->orientation < 0) {
            $this->orientation = 3;
        }
        if ($this->orientation > 3) {
            $this->orientation = 0;
        }
    }

    private function move(string $direction): void
    {
        switch ($direction) {
            case self::EAST:
                ++$this->x;
                break;

            case self::SOUTH:
                --$this->y;
                break;

            case self::NORTH:
                ++$this->y;
                break;

            case self::WEST:
                --$this->x;
            break;
        }

        if ($this->y < 0) {
            $this->y = 9;
        }

        if ($this->x < 0) {
            $this->x = 9;
        }
    }
}
