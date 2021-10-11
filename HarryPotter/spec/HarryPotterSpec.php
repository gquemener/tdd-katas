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
}
