<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\Grid;
use Gquemener\MarsRover\MarsRover;
use PhpSpec\ObjectBehavior;
use Gquemener\MarsRover\ObstacleCollisionDetected;

class MarsRoverSpec extends ObjectBehavior
{
    function let(Grid $grid)
    {
        $this->beConstructedWith($grid);
    }

    function it_stays_on_position($grid)
    {
        $grid->asString()->willReturn('current position');
        $this->execute('');
        $this->position()->shouldReturn('current position');
    }

    function it_turns_on_the_right($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnRight()->willReturn($newGrid);

        $this->execute('R');

        $this->position()->shouldReturn('new grid');
    }

    function it_turns_on_the_left($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnLeft()->willReturn($newGrid);

        $this->execute('L');
        $this->position()->shouldReturn('new grid');
    }

    function it_does_a_U_turn($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnLeft()->willReturn($newGrid);
        $newGrid->turnLeft()->willReturn($newGrid);

        $this->execute('LL');
        $this->position()->shouldReturn('new grid');
    }

    function it_moves_towards_east($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnRight()->willReturn($newGrid);
        $newGrid->move()->willReturn($newGrid);

        $this->execute('RM');
        $this->position()->shouldReturn('new grid');
    }

    function it_moves_towards_south($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnLeft()->willReturn($newGrid);
        $newGrid->turnLeft()->willReturn($newGrid);
        $newGrid->move()->willReturn($newGrid);

        $this->execute('LLM');
        $this->position()->shouldReturn('new grid');
    }

    function it_moves_towards_north($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->move()->willReturn($newGrid);

        $this->execute('M');
        $this->position()->shouldReturn('new grid');
    }

    function it_moves_towards_west($grid, Grid $newGrid)
    {
        $newGrid->asString()->willReturn('new grid');
        $grid->turnLeft()->willReturn($newGrid);
        $newGrid->move()->willReturn($newGrid);

        $this->execute('LM');
        $this->position()->shouldReturn('new grid');
    }

    function it_has_a_string_representation($grid)
    {
        $grid->asString()->willReturn('current position');

        $this->position()->shouldReturn('current position');
    }

    function it_represents_obstacle($grid)
    {
        $grid->move()->willThrow(ObstacleCollisionDetected::class);
        $grid->asString()->willReturn('4:3:E');

        $this->execute('M');

        $this->position()->shouldReturn('O:4:3:E');
    }
}
