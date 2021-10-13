<?php

namespace spec\Gquemener\MarsRover;

use Gquemener\MarsRover\MarsRover;
use PhpSpec\ObjectBehavior;

class MarsRoverSpec extends ObjectBehavior
{
    function it_provides_a_position_given_a_path()
    {
        $this->execute('MMRMMLM')->shouldReturn('2:3:N');
    }

    function it_stays_on_position()
    {
        $this->execute('')->shouldReturn('0:0:N');
    }

    function it_turns_on_the_right()
    {
        $this->execute('R')->shouldReturn('0:0:E');
    }

    function it_turns_on_the_left()
    {
        $this->execute('L')->shouldReturn('0:0:W');
    }

    function it_does_a_U_turn()
    {
        $this->execute('LL')->shouldReturn('0:0:S');
    }

    function it_spins_on_the_left()
    {
        $this->execute('LLLLL')->shouldReturn('0:0:W');
    }

    function it_spins_on_the_right()
    {
        $this->execute('RRRRR')->shouldReturn('0:0:E');
    }

    function it_moves_towards_east()
    {
        $this->execute('RM')->shouldReturn('1:0:E');
    }

    function it_moves_towards_south()
    {
        $this->execute('LLM')->shouldReturn('0:9:S');
    }

    function it_moves_towards_north()
    {
        $this->execute('M')->shouldReturn('0:1:N');
    }

    function it_moves_towards_west()
    {
        $this->execute('LM')->shouldReturn('9:0:W');
    }
}
