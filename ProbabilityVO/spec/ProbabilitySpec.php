<?php

declare(strict_types=1);

namespace spec\GildasQ;

use GildasQ\Probability;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;

class ProbabilitySpec extends ObjectBehavior
{
    function it_is_a_positive_float_value()
    {
        $this->beConstructedWith(-0.5);
        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }

    function it_is_a_float_value_lower_or_equal_to_one()
    {
        $this->beConstructedWith(1.1);
        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }

    function it_combines_with_an_other_probability()
    {
        $this->beConstructedWith(0.3);
        $this->combine(new Probability(0.2))->shouldBeLike(new Probability(0.06));
    }

    function it_has_an_inverse_probability()
    {
        $this->beConstructedWith(0.67);
        $this->inverseOf()->shouldBeLike(new Probability(1 - 0.67));
    }

    function it_computes_result_of_the_either_operation_with_an_other_probability()
    {
        $this->beConstructedWith(0.231);
        $this->either(new Probability(0.5))->shouldBeLike(new Probability(0.231 + 0.5 - 0.231 * 0.5));
    }

    function it_equates_to_another_probability()
    {
        $this->beConstructedWith(0.1);
        $this->equals(new Probability(1 - 0.9))->shouldBe(true);
    }

    function it_does_not_equate_another_probability_greater_by_a_factor_of_the_machine_epsilon()
    {
        $this->beConstructedWith(0.1);
        $this->equals(new Probability(0.1 + PHP_FLOAT_EPSILON))->shouldBe(false);
    }

    function it_does_not_equate_another_probability_lower_by_a_factor_of_the_machine_epsilon()
    {
        $this->beConstructedWith(0.1);
        $this->equals(new Probability(0.1 - PHP_FLOAT_EPSILON))->shouldBe(false);
    }
}
