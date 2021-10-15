<?php

namespace spec\Gquemener\MarsRover\Orientation;

use Gquemener\MarsRover\Orientation;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\South;
use PhpSpec\ObjectBehavior;

class WestSpec extends ObjectBehavior
{
    function it_is_an_orientation()
    {
        $this->shouldBeAnInstanceOf(Orientation::class);
    }

    function it_has_a_string_representation()
    {
        $this->asString()->shouldBe('W');
    }

    function it_turns_right()
    {
        $this->turnRight()->shouldBeAnInstanceOf(North::class);
    }

    function it_turns_left()
    {
        $this->turnLeft()->shouldBeAnInstanceOf(South::class);
    }
}
