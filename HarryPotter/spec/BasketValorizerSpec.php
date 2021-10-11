<?php

namespace spec\GildasQ;

use GildasQ\BasketValueCalculator;
use PhpSpec\ObjectBehavior;
use GildasQ\Book;
use GildasQ\Basket;
use GildasQ\HarryPotter;

class BasketValorizerSpec extends ObjectBehavior
{
    function it_gives_a_value_of_8_EUR_to_a_single_book(Book $book)
    {
        $this->valueOf(Basket::fillWith($book->getWrappedObject()))->shouldBe(800);
    }

    function it_gives_a_discount_of_5_percent_to_two_different_books()
    {
        $basket = Basket::fillWith(
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(2),
        );

        $this->valueOf($basket)->shouldBe(1520);
    }
}
