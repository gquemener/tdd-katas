<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\Grid;
use Gquemener\MarsRover\MarsRover;
use PhpSpec\ObjectBehavior;

class MarsRoverSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new Grid(10, 10));
    }

    function it_stays_on_position()
    {
        $this->execute('');
        $this->position()->shouldReturn('0:0:N');
    }

    function it_turns_on_the_right()
    {
        $this->execute('R');
        $this->position()->shouldReturn('0:0:E');
    }

    function it_turns_on_the_left()
    {
        $this->execute('L');
        $this->position()->shouldReturn('0:0:W');
    }

    function it_does_a_U_turn()
    {
        $this->execute('LL');
        $this->position()->shouldReturn('0:0:S');
    }

    function it_spins_on_the_left()
    {
        $this->execute('LLLLL');
        $this->position()->shouldReturn('0:0:W');
    }

    function it_spins_on_the_right()
    {
        $this->execute('RRRRR');
        $this->position()->shouldReturn('0:0:E');
    }

    function it_moves_towards_east()
    {
        $this->execute('RM');
        $this->position()->shouldReturn('1:0:E');
    }

    function it_moves_towards_south()
    {
        $this->execute('LLM');
        $this->position()->shouldReturn('0:9:S');
    }

    function it_moves_towards_north()
    {
        $this->execute('M');
        $this->position()->shouldReturn('0:1:N');
    }

    function it_moves_towards_west()
    {
        $this->execute('LM');
        $this->position()->shouldReturn('9:0:W');
    }
}
