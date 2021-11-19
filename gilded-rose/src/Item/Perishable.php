<?php

namespace GildedRose\Item;

use GildedRose\Item;

final class Perishable
{
    private function __construct(private Item $item)
    {
    }

    public static function fromString(string $value): self
    {
        [$name, $sellIn, $quality] = array_map('trim', explode(',', $value));
        $item = new Item($name, (int) $sellIn, (int) $quality);

        return new self($item);
    }

    public function sellIn(): int
    {
        return $this->item->sell_in;
    }

    public function quality(): int
    {
        return $this->item->quality;
    }

    public function updateQuality(): void
    {
        --$this->item->sell_in;

        $q = 1;
        if ($this->item->sell_in < 0) {
            $q = 2;
        }
        $this->item->quality -= $q;
    }
}
