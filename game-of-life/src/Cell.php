<?php

declare(strict_types=1);

namespace Gquemener\GameOfLifeKata;

class Cell
{
    private function __construct(
        private bool $living
    ) {
    }

    public static function living(): self
    {
        return new self(true);
    }

    public static function dead(): self
    {
        return new self(false);
    }

    public function asString(): string
    {
        return $this->living ? '*' : '.';
    }
}
