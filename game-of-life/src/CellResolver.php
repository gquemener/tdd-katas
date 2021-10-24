<?php

namespace Gquemener\GameOfLifeKata;

interface CellResolver
{
    public function next(Cell $cell, Cell ...$neighbors);
}
