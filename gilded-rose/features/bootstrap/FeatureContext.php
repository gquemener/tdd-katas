<?php

use Assert\Assert;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GildedRose\Item\Perishable;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private ?Perishable $item;

    /**
     * @Given the perishable item :item
     */
    public function thePerishableItem(string $item)
    {
        $this->item = Perishable::fromString($item);
    }

    /**
     * @Then the item should have the following history:
     */
    public function theItemShouldHaveTheFollowingHistory(TableNode $table)
    {
        foreach ($table->getHash() as $value) {
            Assert::that($this->item->sellIn())->same((int) $value['Sell in']);
            Assert::that($this->item->quality())->same((int) $value['Quality']);

            $this->item->updateQuality();
        }
    }
}
