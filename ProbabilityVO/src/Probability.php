<?php

declare(strict_types=1);

namespace GildasQ;

use InvalidArgumentException;

final class Probability
{
    public function __construct(float $value)
    {
        if ($value < 0.0 || $value > 1.0) {
            throw new InvalidArgumentException();
        }

        $this->value = $value;
    }

    public function combine(self $other): self
    {
        return new self($this->value * $other->value);
    }

    public function inverseOf(): self
    {
        return new self(1.0 - $this->value);
    }

    public function either(self $other): self
    {
        return new self($this->value + $other->value - $this->value * $other->value);
    }

    public function equals(self $other): bool
    {
        return abs($this->value - $other->value) < PHP_FLOAT_EPSILON;
    }
}
