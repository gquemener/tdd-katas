<?php

namespace spec\GildasQ;

use GildasQ\BasketValueCalculator;
use PhpSpec\ObjectBehavior;
use GildasQ\Book;
use GildasQ\Basket;

class BasketValorizerSpec extends ObjectBehavior
{
    function it_gives_a_value_of_8_EUR_to_a_single_book(Book $book)
    {
        $this->valueOf(Basket::fillWith($book->getWrappedObject()))->shouldBe(800);
    }
}
