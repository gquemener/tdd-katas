<?php

namespace spec\Diversion;

use Diversion\Diversion;
use PhpSpec\ObjectBehavior;

class DiversionSpec extends ObjectBehavior
{
    function it_count_diversions_for_an_integer()
    {
        $this->countFor(3)->shouldReturn(5);
    }
}
