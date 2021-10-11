<?php

namespace spec\GildasQ;

use GildasQ\Basket;
use GildasQ\Book;
use PhpSpec\ObjectBehavior;

class BasketSpec extends ObjectBehavior
{
    function it_has_books(Book $book)
    {
        $this->beConstructedThrough('fillWith', [$book]);

        $this->books()->shouldReturn([$book]);
    }
}
