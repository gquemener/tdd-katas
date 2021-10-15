<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\Grid;
use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;
use Gquemener\MarsRover\Position;
use PhpSpec\ObjectBehavior;

class GridSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(10, 10);
    }

    function it_has_a_current_position()
    {
        $this->position()->shouldBe('0:0');
    }

    function it_has_a_current_orientation()
    {
        $this->orientation()->shouldBe('N');
    }

    function it_turns_right()
    {
        $this->turnRight();
        $this->orientation()->shouldBe('E');

        $this->turnRight();
        $this->orientation()->shouldBe('S');

        $this->turnRight();
        $this->orientation()->shouldBe('W');

        $this->turnRight();
        $this->orientation()->shouldBe('N');
    }

    function it_turns_left()
    {
        $this->turnLeft();
        $this->orientation()->shouldBeLike('W');
        $this->turnLeft();
        $this->orientation()->shouldBeLike('S');
        $this->turnLeft();
        $this->orientation()->shouldBeLike('E');
        $this->turnLeft();
        $this->orientation()->shouldBeLike('N');
    }

    function it_moves_in_the_north_direction()
    {
        $this->move();
        $this->position()->shouldBe('0:1');
    }

    function it_moves_in_the_east_direction()
    {
        $this->turnRight();
        $this->move();

        $this->position()->shouldBe('1:0');
    }

    function it_moves_in_the_south_direction()
    {
        $this->move();
        $this->move();
        $this->turnRight();
        $this->move();
        $this->turnRight();
        $this->move();

        $this->position()->shouldBe('1:1');
    }

    function it_moves_in_the_west_direction()
    {
        $this->turnRight();
        $this->move();
        $this->move();
        $this->move();
        $this->turnLeft();
        $this->move();
        $this->turnLeft();
        $this->move();

        $this->position()->shouldBe('2:1');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_longitude_in_the_west_direction()
    {
        $this->turnLeft();
        $this->move();

        $this->position()->shouldBe('9:0');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_longitude_in_the_east_direction()
    {
        $this->turnRight();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();

        $this->position()->shouldBe('0:0');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_latitude_in_the_south_direction()
    {
        $this->turnLeft();
        $this->turnLeft();
        $this->move();

        $this->position()->shouldBe('0:9');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_latitude_in_the_north_direction()
    {
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();
        $this->move();

        $this->position()->shouldBe('0:0');
    }
}
