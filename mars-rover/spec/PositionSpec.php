<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\Position;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;
use Gquemener\MarsRover\Orientation;

class PositionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('at', [12, 5]);
    }

    function it_has_coordinates()
    {
        $this->x()->shouldBe(12);
        $this->y()->shouldBe(5);
    }

    function it_moves_towards_north()
    {
        $this->move(new North())->shouldBeLike(Position::at(12, 6));
    }

    function it_moves_towards_east()
    {
        $this->move(new East())->shouldBeLike(Position::at(13, 5));
    }

    function it_moves_towards_south()
    {
        $this->move(new South())->shouldBeLike(Position::at(12, 4));
    }

    function it_moves_towards_west()
    {
        $this->move(new West())->shouldBeLike(Position::at(11, 5));
    }

    function it_throws_exception_when_moving_toward_unknown_orientation(
        Orientation $orientation
    ) {
        $this->shouldThrow(InvalidArgumentException::class)->duringMove($orientation);
    }

    function it_has_a_string_representation()
    {
        $this->asString()->shouldBe('12:5');
    }

    function it_wraps_x_to_the_start()
    {
        $position = $this->wrapX(10);
        $position->asString()->shouldBe('2:5');
    }

    function it_wraps_x_to_the_end()
    {
        $this->beConstructedThrough('at', [-3, 5]);
        $position = $this->wrapX(10);
        $position->asString()->shouldBe('7:5');
    }

    function it_does_not_wrap_x()
    {
        $position = $this->wrapX(15);
        $position->asString()->shouldBe('12:5');
    }

    function it_wraps_y_to_the_start()
    {
        $position = $this->wrapY(3);
        $position->asString()->shouldBe('12:2');
    }

    function it_wraps_y_to_the_end()
    {
        $this->beConstructedThrough('at', [12, -2]);
        $position = $this->wrapY(10);
        $position->asString()->shouldBe('12:8');
    }

    function it_does_not_wrap_y()
    {
        $position = $this->wrapY(15);
        $position->asString()->shouldBe('12:5');
    }

    function it_is_equal_to_another_position_with_the_same_coordinates()
    {
        $this->equals(Position::at(12, 5))->shouldBe(true);
    }

    function it_is_not_equal_to_another_position_with_different_coordinates()
    {
        $this->equals(Position::at(8, 10))->shouldBe(false);
    }
}
