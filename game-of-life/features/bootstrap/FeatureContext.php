<?php

use Assert\Assert;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Gquemener\GameOfLifeKata\Generation;

class FeatureContext implements Context
{
    private ?Generation $generation;

    /**
     * @When the current cells' generation is the following:
     */
    public function theCurrentCellsGenerationIsTheFollowing(PyStringNode $grid)
    {
        $this->generation = Generation::fromString((string) $grid);
    }

    /**
     * @Then the next generation should be:
     */
    public function theNextGenerationShouldBe(PyStringNode $grid)
    {
        $generation = $this->generation->next();
        Assert::that($generation->asString())->same((string) $grid);
    }
}
