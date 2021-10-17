<?php

namespace GildasQ;

final class HarryPotter implements Book
{
    private function __construct(
        private int $volume
    ) {
    }

    public static function fromVolume(int $volume): self
    {
        if ($volume < 1 || $volume > 5) {
            throw new \InvalidArgumentException();
        }

        return new self($volume);
    }

    public function volume(): int
    {
        return $this->volume;
    }
}
