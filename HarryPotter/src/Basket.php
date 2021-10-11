<?php

namespace GildasQ;

final class Basket
{
    private function __construct(
        private array $books
    ) {
    }

    public static function fillWith(Book ...$books): self
    {
        return new self($books);
    }

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    public function books(): array
    {
        return $this->books;
    }
}
