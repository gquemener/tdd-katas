<?php

namespace GildasQ;

final class Basket
{
    private function __construct(
        private array $books
    ) {
    }

    public static function empty(): self
    {
        return new self([]);
    }

    public static function fillWith(Book ...$books): self
    {
        return new self($books);
    }

    public function books(): array
    {
        return $this->books;
    }

    public function countBooks(): int
    {
        return count($this->books);
    }
}
