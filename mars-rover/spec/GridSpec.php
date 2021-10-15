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
        $newGrid = $this->turnRight();
        $newGrid->orientation()->shouldBe('E');

        $newGrid = $newGrid->turnRight();
        $newGrid->orientation()->shouldBe('S');

        $newGrid = $newGrid->turnRight();
        $newGrid->orientation()->shouldBe('W');

        $newGrid = $newGrid->turnRight();
        $newGrid->orientation()->shouldBe('N');
    }

    function it_turns_left()
    {
        $newGrid = $this->turnLeft();
        $newGrid->orientation()->shouldBeLike('W');

        $newGrid = $newGrid->turnLeft();
        $newGrid->orientation()->shouldBeLike('S');

        $newGrid = $newGrid->turnLeft();
        $newGrid->orientation()->shouldBeLike('E');

        $newGrid = $newGrid->turnLeft();
        $newGrid->orientation()->shouldBeLike('N');
    }

    function it_moves_in_the_north_direction()
    {
        $newGrid = $this->move();
        $newGrid->position()->shouldBe('0:1');
    }

    function it_moves_in_the_east_direction()
    {
        $newGrid = $this->turnRight();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('1:0');
    }

    function it_moves_in_the_south_direction()
    {
        $newGrid = $this->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnRight();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnRight();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('1:1');
    }

    function it_moves_in_the_west_direction()
    {
        $newGrid = $this->turnRight();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnLeft();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnLeft();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('2:1');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_longitude_in_the_west_direction()
    {
        $newGrid = $this->turnLeft();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('9:0');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_longitude_in_the_east_direction()
    {
        $newGrid = $this->turnRight();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('0:0');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_latitude_in_the_south_direction()
    {
        $newGrid = $this->turnLeft();
        $newGrid = $newGrid->turnLeft();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('0:9');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_latitude_in_the_north_direction()
    {
        $newGrid = $this->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->move();

        $newGrid->position()->shouldBe('0:1');
    }
}
