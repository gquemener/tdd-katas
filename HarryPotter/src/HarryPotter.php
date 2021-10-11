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
        return new self($volume);
    }

    public function volume(): int
    {
        return $this->volume;
    }
}
