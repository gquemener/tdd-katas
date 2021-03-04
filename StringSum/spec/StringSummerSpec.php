<?php

namespace spec\GildasQ;

use GildasQ\StringSummer;
use PhpSpec\ObjectBehavior;

class StringSummerSpec extends ObjectBehavior
{
    function it_sums_up_natural_number()
    {
        $this->sum('4', '8')->shouldReturn('12');
    }

    function it_converts_empty_value_into_0()
    {
        $this->sum('', '42')->shouldReturn('42');
    }

    function it_converts_non_natural_integer_value_into_0()
    {
        $this->sum('foo', '28')->shouldReturn('28');
    }

    function it_converts_mispelled_natural_into_0()
    {
        $this->sum('7foo', '12')->shouldReturn('12');
    }

    function it_converts_negative_number_into_0()
    {
        $this->sum('-3', '25')->shouldReturn('25');
    }

    function it_converts_decimals_with_dot_separator_into_0()
    {
        $this->sum('5', '3.14')->shouldReturn('5');
    }

    function it_converts_decimals_with_coma_separator_into_0()
    {
        $this->sum('8', '4,6')->shouldReturn('8');
    }
}
