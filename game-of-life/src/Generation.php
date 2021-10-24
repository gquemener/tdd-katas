<?php

declare(strict_types=1);

namespace Gquemener\GameOfLifeKata;

final class Generation
{
    private function __construct(
        private array $cells,
        private CellResolver $cellResolver
    ) {
    }

    public static function fromString(string $value, CellResolver $cellResolver): self
    {
        $lines = explode("\n", $value);
        [$rows, $columns] = explode(' ', $lines[0]);
        $rows = (int) $rows;
        $columns = (int) $columns;
        unset($lines[0]);

        $cells = [];
        foreach ($lines as $key => $line) {
            foreach (str_split($line, 1) as $char) {
                $cells[$key][] = '*' === $char ? Cell::living() : Cell::dead();
            }
        }

        return new self($cells, $cellResolver);
    }

    public function asString()
    {
        $lines = ['1 1'];

        foreach ($this->cells as $cells) {
            $lines[] = array_reduce(
                $cells,
                fn (string $line, Cell $cell): string => $line . $cell->asString(),
                ''
            );
        }

        return implode("\n", $lines);
    }

    public function next(): self
    {
        $cell = [];
        foreach ($this->cells as $cell) {
            
        }
        return $this
    }
}
