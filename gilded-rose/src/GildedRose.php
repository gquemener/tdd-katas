<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key] = $item->updateQuality();
        }
    }

    public function __toString(): string
    {
        $str = 'name, sellIn, quality' . PHP_EOL;
        foreach ($this->items as $item) {
            $str .= $item . PHP_EOL;
        }

        return $str;
    }
}
