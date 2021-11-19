<?php

namespace spec\GildedRose;

use GildedRose\Item;
use PhpSpec\ObjectBehavior;

class ItemSpec extends ObjectBehavior
{
    function it_decreases_quality_when_perishable()
    {
        $this->beConstructedThrough('perishable', ['yogourt', 3, 10]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('yogourt, 2, 9');
    }

    function it_increases_quality_when_fine_tunable()
    {
        $this->beConstructedThrough('fineTunable', ['cheese', 3, 0]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('cheese, 2, 1');
    }

    function it_increases_quality_faster_when_fine_tunable_good_sell_in_is_past_due()
    {
        $this->beConstructedThrough('fineTunable', ['cheese', 0, 10]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('cheese, -1, 12');
    }

    function it_decreases_quality_faster_when_perishable_good_sell_in_is_past_due()
    {
        $this->beConstructedThrough('perishable', ['yogourt', 0, 10]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('yogourt, -1, 8');
    }

    function its_quality_does_not_increase_above_50()
    {
        $this->beConstructedThrough('fineTunable', ['cheese', 3, 50]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('cheese, 2, 50');
    }

    function its_quality_is_never_negative()
    {
        $this->beConstructedThrough('perishable', ['yogourt', 3, 0]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('yogourt, 2, 0');
    }

    function it_does_not_update_sell_in_and_quality_when_legendary()
    {
        $this->beConstructedThrough('legendary', ['Sulfuras', -1]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('Sulfuras, -1, 80');
    }

    function its_quality_increases_by_1_when_backstage_pass_sell_in_is_more_than_10_days()
    {
        $this->beConstructedThrough('backstagePass', ['ACDC', 11, 23]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('ACDC, 10, 24');
    }

    function its_quality_increases_by_2_when_backstage_pass_sell_in_is_10_days_or_less()
    {
        $this->beConstructedThrough('backstagePass', ['ACDC', 6, 33]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('ACDC, 5, 35');
    }

    function its_quality_increases_by_3_when_backstage_pass_sell_in_is_5_days_or_less()
    {
        $this->beConstructedThrough('backstagePass', ['ACDC', 5, 35]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('ACDC, 4, 38');
    }

    function its_quality_drops_to_0_when_concert_is_passed()
    {
        $this->beConstructedThrough('backstagePass', ['ACDC', 0, 23]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('ACDC, -1, 0');
    }

    function it_decreases_quality_faster_when_conjured()
    {
        $this->beConstructedThrough('conjured', ['cake', 3, 10]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('cake, 2, 9');
    }

    function its_quality_is_not_lower_than_0_when_perishable()
    {
        $this->beConstructedThrough('perishable', ['yogourt', -3, 0]);
        $item = $this->updateQuality();

        $item->__toString()->shouldBe('yogourt, -4, 0');
    }
}
