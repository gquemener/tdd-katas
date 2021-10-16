<?php

declare(strict_types=1);

namespace Gquemener\GameOfLifeKata;

final class Generation
{
    private function __construct(
        private string $value
    ) {
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function asString()
    {
        return $this->value;
    }

    public function next(): self
    {
        return $this;
    }
}
