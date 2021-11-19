<?php

namespace spec\GildedRose\Item;

use GildedRose\EvolvingItem;
use GildedRose\Item\Perishable;
use PhpSpec\ObjectBehavior;

class PerishableSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['Item, 10, 15']);
    }

    function it_has_a_sell_in_counter()
    {
        $this->sellIn()->shouldReturn(10);
    }

    function it_has_a_quality_counter()
    {
        $this->quality()->shouldReturn(15);
    }

    function it_degrades_quality_by_1_every_day_that_passes()
    {
        $this->updateQuality();
        $this->sellIn()->shouldReturn(9);
        $this->quality()->shouldReturn(14);
    }

    function it_degrades_quality_by_2_every_day_that_passes_when_sell_in_date_is_lower_or_equal_to_0()
    {
        $this->beConstructedThrough('fromString', ['Item, 0, 15']);
        $this->updateQuality();
        $this->sellIn()->shouldReturn(-1);
        $this->quality()->shouldReturn(13);
    }

    function it_keep_quality_above_negative_threshold()
    {
        $this->beConstructedThrough('fromString', ['Item, 10, 0']);
        $this->updateQuality();
        $this->sellIn()->shouldReturn(9);
        $this->quality()->shouldReturn(0);
    }
}
