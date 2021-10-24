<?php

namespace spec\Gquemener\GameOfLifeKata;

use Gquemener\GameOfLifeKata\Cell;
use Gquemener\GameOfLifeKata\Generation;
use Gquemener\GameOfLifeKata\CellResolver;
use PhpSpec\ObjectBehavior;

class GenerationSpec extends ObjectBehavior
{
    function let(CellResolver $cellResolver)
    {
        $this->beConstructedThrough('fromString', [<<<STR
        1 1
        .
        STR, $cellResolver]);
    }

    function it_has_a_string_representation()
    {
        $this->asString()->shouldBe(<<<STR
        1 1
        .
        STR);
    }

    function it_computes_the_next_generation_of_a_single_cell($cellResolver)
    {
        $cellResolver->next(Cell::dead(), [])->willReturn(Cell::living());

        $nextGen = $this->next();
        $nextGen->shouldBeAnInstanceOf(Generation::class);
        $nextGen->asString()->shouldBe(<<<STR
        1 1
        *
        STR);
    }
}
