<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;

echo 'OMGHAI!' . PHP_EOL;

$items = [
    Item::perishable('+5 Dexterity Vest', 10, 20),
    Item::fineTunable('Aged Brie', 2, 0),
    Item::perishable('Elixir of the Mongoose', 5, 7),
    Item::legendary('Sulfuras, Hand of Ragnaros', 0, 80),
    Item::legendary('Sulfuras, Hand of Ragnaros', -1, 80),
    Item::backstagePass('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    Item::backstagePass('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    Item::backstagePass('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    Item::conjured('Conjured Mana Cake', 3, 6),
];

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo "-------- day ${i} --------" . PHP_EOL;
    echo $app->__toString() . PHP_EOL;

    $app->updateQuality();
}
