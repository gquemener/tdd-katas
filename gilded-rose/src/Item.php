<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    private const FINE_TUNABLE = 0;
    private const PERISHABLE = 1;
    private const LEGENDARY = 2;
    private const BACKSTAGE_PASS = 3;
    private const CONJURED = 4;

    private function __construct(
        private string $name,
        private int $sellIn,
        private int $quality,
        private int $type,
    ) {
    }

    public static function fineTunable(string $name, int $sellIn, int $quality): self
    {
        return new self($name, $sellIn, $quality, self::FINE_TUNABLE);
    }

    public static function perishable(string $name, int $sellIn, int $quality): self
    {
        return new self($name, $sellIn, $quality, self::PERISHABLE);
    }

    public static function legendary(string $name, int $sellIn): self
    {
        return new self($name, $sellIn, 80, self::LEGENDARY);
    }

    public static function backstagePass(string $name, int $sellIn, int $quality): self
    {
        return new self($name, $sellIn, $quality, self::BACKSTAGE_PASS);
    }

    public static function conjured(string $name, int $sellIn, int $quality): self
    {
        return new self($name, $sellIn, $quality, self::CONJURED);
    }

    public function updateQuality(): self
    {
        $self = clone $this;

        if (self::LEGENDARY === $self->type) {
            return $self;
        }

        --$self->sellIn;

        if (in_array($self->type, [self::PERISHABLE, self::CONJURED], true)) {
            if ($self->sellIn < 0) {
                $self->quality -= 2;
            } else if ($self->quality > 0) {
                --$self->quality;
            }

            if ($self->quality < 0) {
                $self->quality = 0;
            }
        } else if (self::BACKSTAGE_PASS === $self->type) {
            if ($self->sellIn < 0) {
                $self->quality = 0;
            } else if ($self->sellIn < 5) {
                $self->quality += 3;
            } else if ($self->sellIn < 10) {
                $self->quality += 2;
            } else {
                ++$self->quality;
            }
        } else {
            if ($self->sellIn < 0) {
                $self->quality += 2;
            } else {
                ++$self->quality;
            }
        }

        if ($self->quality > 50) {
            $self->quality = 50;
        }

        return $self;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
