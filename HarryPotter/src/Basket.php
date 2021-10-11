<?php

namespace GildasQ;

final class Basket
{
    private array $volumes = [];

    private function __construct(
        private array $books
    ) {
        foreach ($books as $book) {
            $this->volumes[(string) $book->volume()] = true;
        }
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

    public function countVolumes(): int
    {
        return count($this->volumes);
    }
}
