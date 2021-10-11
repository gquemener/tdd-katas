<?php

namespace spec\GildasQ;

use GildasQ\BasketValueCalculator;
use PhpSpec\ObjectBehavior;
use GildasQ\Book;
use GildasQ\Basket;
use GildasQ\HarryPotter;

class BasketValorizerSpec extends ObjectBehavior
{
    function it_gives_a_value_of_0_EUR_to_an_empty_basket()
    {
        $this->valueOf(Basket::empty())->shouldBe(0);
    }

    function it_gives_a_value_of_8_EUR_to_a_single_book(Book $book)
    {
        $this->valueOf(Basket::fillWith($book->getWrappedObject()))->shouldBe(800);
    }

    function it_gives_a_value_of_16_EUR_to_two_identical_books()
    {
        $basket = Basket::fillWith(
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(1),
        );

        $this->valueOf($basket)->shouldBe(1600);
    }

    function it_gives_a_discount_of_5_percent_to_two_different_volumes()
    {
        $basket = Basket::fillWith(
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(2),
            HarryPotter::fromVolume(2),
        );

        $this->valueOf($basket)->shouldBe(2320);
    }

    function it_gives_a_discount_of_10_percent_to_three_different_volumes()
    {
        $basket = Basket::fillWith(
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(2),
            HarryPotter::fromVolume(2),
            HarryPotter::fromVolume(3),
        );

        $this->valueOf($basket)->shouldBe(2960);
    }

    function it_gives_a_discount_of_20_percent_to_four_different_volumes()
    {
        $basket = Basket::fillWith(
            HarryPotter::fromVolume(1),
            HarryPotter::fromVolume(3),
            HarryPotter::fromVolume(2),
            HarryPotter::fromVolume(4),
            HarryPotter::fromVolume(3),
            HarryPotter::fromVolume(3),
        );

        $this->valueOf($basket)->shouldBe(4160);
    }
}
