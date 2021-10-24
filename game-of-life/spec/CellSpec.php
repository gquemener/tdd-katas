<?php

namespace spec\Gquemener\GameOfLifeKata;

use Gquemener\GameOfLifeKata\Cell;
use PhpSpec\ObjectBehavior;

class CellSpec extends ObjectBehavior
{
    function it_represents_living_cell_as_a_star_char()
    {
        $this->beConstructedThrough('living');
        $this->asString()->shouldBe('*');
    }

    function it_represents_dead_cell_as_a_dot_char()
    {
        $this->beConstructedThrough('dead');
        $this->asString()->shouldBe('.');
    }
}
