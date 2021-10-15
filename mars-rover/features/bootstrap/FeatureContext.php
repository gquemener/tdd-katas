<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Gquemener\MarsRover\MarsRover;
use Gquemener\MarsRover\Grid;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @Given Mars has been splitted into a grid of :width x :height squares
     */
    public function marsHasBeenSplittedIntoAGridOfXSquares(int $width, int $height)
    {
        $this->rover = new MarsRover(new Grid($width, $height));
    }

    /**
     * @When I reveive the :commands commands sequence
     */
    public function iReveiveTheCommandsSequence(string $commands)
    {
        $this->rover->execute($commands);
    }

    /**
     * @Then my current position should be :position
     */
    public function myCurrentPositionShouldBe($position)
    {
        if ($position !== $this->rover->position()) {
            throw new \Exception(sprintf(
                'Expecting to be at position "%s", currently at "%s".',
                $position,
                $this->rover->position()
            ));
        }
    }
}
