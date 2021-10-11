<?php

namespace spec\GildasQ;

use GildasQ\Basket;
use GildasQ\Book;
use PhpSpec\ObjectBehavior;

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

    function it_counts_contained_books(Book $book)
    {
        $this->beConstructedThrough('fillWith', [$book, $book, $book]);

        $this->countBooks()->shouldBe(3);
    }
}
