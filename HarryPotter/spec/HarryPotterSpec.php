<?php

namespace spec\GildasQ;

use GildasQ\HarryPotter;
use PhpSpec\ObjectBehavior;
use GildasQ\Book;

class HarryPotterSpec extends ObjectBehavior
{
    function it_is_a_book()
    {
        $this->shouldBeAnInstanceOf(Book::class);
    }

    function it_has_a_volume_number()
    {
        $this->beConstructedThrough('fromVolume', [1]);

        $this->volume()->shouldBe(1);
    }

    function its_volume_is_greater_than_0()
    {
        $this->beConstructedThrough('fromVolume', [0]);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function its_volume_is_lower_or_equal_to_5()
    {
        $this->beConstructedThrough('fromVolume', [6]);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}
