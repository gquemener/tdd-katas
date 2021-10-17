<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\Grid;
use Gquemener\MarsRover\Orientation\East;
use Gquemener\MarsRover\Orientation\North;
use Gquemener\MarsRover\Orientation\South;
use Gquemener\MarsRover\Orientation\West;
use Gquemener\MarsRover\Position;
use PhpSpec\ObjectBehavior;
use Gquemener\MarsRover\ObstacleCollisionDetected;

class SurfaceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(10, 10);
    }

    function it_is_a_grid()
    {
        $this->shouldBeAnInstanceOf(Grid::class);
    }

    function it_has_a_string_representation()
    {
        $this->asString()->shouldBe('0:0:N');
    }

    function it_turns_right()
    {
        $newGrid = $this->turnRight();
        $newGrid->asString()->shouldBe('0:0:E');

        $newGrid = $newGrid->turnRight();
        $newGrid->asString()->shouldBe('0:0:S');

        $newGrid = $newGrid->turnRight();
        $newGrid->asString()->shouldBe('0:0:W');

        $newGrid = $newGrid->turnRight();
        $newGrid->asString()->shouldBe('0:0:N');
    }

    function it_turns_left()
    {
        $newGrid = $this->turnLeft();
        $newGrid->asString()->shouldBe('0:0:W');

        $newGrid = $newGrid->turnLeft();
        $newGrid->asString()->shouldBe('0:0:S');

        $newGrid = $newGrid->turnLeft();
        $newGrid->asString()->shouldBe('0:0:E');

        $newGrid = $newGrid->turnLeft();
        $newGrid->asString()->shouldBe('0:0:N');
    }

    function it_moves_in_the_north_direction()
    {
        $newGrid = $this->move();
        $newGrid->asString()->shouldBe('0:1:N');
    }

    function it_moves_in_the_east_direction()
    {
        $newGrid = $this->turnRight();
        $newGrid = $newGrid->move();

        $newGrid->asString()->shouldBe('1:0:E');
    }

    function it_moves_in_the_south_direction()
    {
        $newGrid = $this->move();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnRight();
        $newGrid = $newGrid->move();
        $newGrid = $newGrid->turnRight();
        $newGrid = $newGrid->move();

        $newGrid->asString()->shouldBe('1:1:S');
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

        $newGrid->asString()->shouldBe('2:1:W');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_longitude_in_the_west_direction()
    {
        $newGrid = $this->turnLeft();
        $newGrid = $newGrid->move();

        $newGrid->asString()->shouldBe('9:0:W');
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

        $newGrid->asString()->shouldBe('0:0:E');
    }

    function it_wraps_to_the_opposite_end_of_the_grid_when_following_the_latitude_in_the_south_direction()
    {
        $newGrid = $this->turnLeft();
        $newGrid = $newGrid->turnLeft();
        $newGrid = $newGrid->move();

        $newGrid->asString()->shouldBe('0:9:S');
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

        $newGrid->asString()->shouldBe('0:1:N');
    }

    function it_throws_exception_when_hitting_an_obstacle()
    {
        $newGrid = $this->withAddedObstacle(Position::at(0, 1));
        $newGrid->shouldThrow(ObstacleCollisionDetected::class)->duringMove();
    }
}
