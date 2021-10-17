<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Gquemener\MarsRover\MarsRover;
use Gquemener\MarsRover\Grid;
use Gquemener\MarsRover\Surface;
use Gquemener\MarsRover\Position;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private ?Surface $grid;
    private ?MarsRover $rover;

    /**
     * @Given Mars has been splitted into a grid of :width x :height squares
     */
    public function marsHasBeenSplittedIntoAGridOfXSquares(int $width, int $height)
    {
        $this->grid = new Surface($width, $height);
    }

    /**
     * @Given there is an obstacle at position (:x, :y)
     */
    public function thereIsAnObstacleAtPosition(int $x, int $y)
    {
        $this->grid = $this->grid->withAddedObstacle(Position::at($x, $y));
    }

    /**
     * @When I reveive the :commands commands sequence
     */
    public function iReveiveTheCommandsSequence(string $commands)
    {
        $this->rover = new MarsRover($this->grid);
        $this->rover->execute($commands);
    }

    /**
     * @Then my current position should be :position
     */
    public function myCurrentPositionShouldBe($position)
    {
        if ($position !== $current = $this->rover->position()) {
            throw new \Exception(sprintf(
                'Expecting to be at position "%s", currently at "%s".',
                $position,
                $current
            ));
        }
    }
}
