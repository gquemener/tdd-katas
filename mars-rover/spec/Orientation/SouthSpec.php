<?php

namespace spec\Gquemener\MarsRover\Orientation;

use Gquemener\MarsRover\Orientation;
use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\West;
use PhpSpec\ObjectBehavior;

class SouthSpec extends ObjectBehavior
{
    function it_is_an_orientation()
    {
        $this->shouldBeAnInstanceOf(Orientation::class);
    }

    function it_as_a_string_representation()
    {
        $this->asString()->shouldBe('S');
    }

    function it_turns_right()
    {
        $this->turnRight()->shouldBeAnInstanceOf(West::class);
    }

    function it_turns_left()
    {
        $this->turnLeft()->shouldBeAnInstanceOf(East::class);
    }
}
