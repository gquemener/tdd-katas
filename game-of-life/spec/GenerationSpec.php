<?php

namespace spec\Gquemener\GameOfLifeKata;

use Gquemener\GameOfLifeKata\Generation;
use PhpSpec\ObjectBehavior;

class GenerationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', [<<<STR
        4 8
        ........
        ....*...
        ...**...
        ........
        STR]);
    }
    function it_has_a_string_representation()
    {
        $this->asString()->shouldBe(<<<STR
        4 8
        ........
        ....*...
        ...**...
        ........
        STR);
    }

    function it_computes_the_next_generation()
    {
        $this->next()->shouldBeAnInstanceOf(Generation::class);
    }
}
