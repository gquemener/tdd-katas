<?php

declare(strict_types=1);

namespace Gquemener\MarsRover;

use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;
use InvalidArgumentException;

final class Position
{
    private function __construct(
        private int $x,
        private int $y,
    ) {
    }

    public static function at(int $x, int $y): self
    {
        return new self($x, $y);
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function move(Orientation $orientation): self
    {
        return match($orientation::class) {
            North::class => self::at($this->x, $this->y + 1),
            East::class => self::at($this->x + 1, $this->y),
            South::class => self::at($this->x, $this->y - 1),
            West::class => self::at($this->x - 1, $this->y),
            default => throw new InvalidArgumentException(sprintf('Unknown orientation "%s".', $orientation::class)),
        };
    }

    public function asString(): string
    {
        return sprintf('%d:%d', $this->x, $this->y);;
    }

    public function wrapX(int $max): self
    {
        $self = clone $this;

        if ($self->x < 0) {
            $self->x += $max;
        }

        if ($self->x >= $max) {
            $self->x -= $max;
        }

        return $self;
    }

    public function wrapY(int $max): self
    {
        $self = clone $this;

        if ($self->y < 0) {
            $self->y += $max;
        }

        if ($self->y >= $max) {
            $self->y -= $max;
        }

        return $self;
    }

    public function equals(self $other): bool
    {
        return $other->x === $this->x && $other->y === $this->y;
    }
}
