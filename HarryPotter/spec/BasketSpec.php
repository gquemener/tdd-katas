<?php

namespace spec\GildasQ;

use GildasQ\Basket;
use GildasQ\Book;
use PhpSpec\ObjectBehavior;
use GildasQ\HarryPotter;

class BasketSpec extends ObjectBehavior
{
    function it_is_empty()
    {
        $this->beConstructedThrough('empty');

        $this->books()->shouldReturn([]);
    }

    function it_has_books(Book $book)
    {
        $this->beConstructedThrough('fillWith', [$book]);

        $this->books()->shouldReturn([$book]);
    }

    function it_contains_3_books(Book $book)
    {
        $this->beConstructedThrough('fillWith', [$book, $book, $book]);

        $this->countBooks()->shouldBe(3);
    }

    function it_contains_1_volume()
    {
        $this->beConstructedThrough('fillWith', [
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(1),
        ]);

        $this->countVolumes()->shouldBe(1);
    }

    function it_contains_2_volumes()
    {
        $this->beConstructedThrough('fillWith', [
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(2),
        ]);

        $this->countVolumes()->shouldBe(2);
    }
}
