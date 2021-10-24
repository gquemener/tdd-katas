<?php

namespace spec\Gquemener\GameOfLifeKata;

use Gquemener\GameOfLifeKata\LivingCell;
use PhpSpec\ObjectBehavior;

class LiveCellSpec extends ObjectBehavior
{
    function it_dies_when_it_has_not_enough_live_neighbors()
    {
        $this->beConstructedThrough('withNeighbors');
        $this->evolve()->shouldBeAnInstanceOf(DeadCell::class);
    }

    function it_dies_when_it_has_too_many_neighbors()
    {
    }

    function it_survives()
    {
        
    }
}
