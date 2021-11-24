<?php

declare(strict_types=1);

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Step\Then;
use Behat\Step\When;

final class FeatureContext implements Context
{
    private ?array $output = null;
    private ?int $retval = null;

    #[When('I execute :command')]
    public function iExecute(string $command): void
    {
        exec($command, $this->output, $this->retval);
    }

    #[Then('result code should be 0')]
    public function resultCodeShouldBe0(): void
    {
        if (0 === $this->retval) {
            return;
        }

        throw new LogicException(sprintf(
            'Command failed with exit code: %d%s' . PHP_EOL,
            $this->retval,
            implode(PHP_EOL, $this->output)
        ));
    }

    #[Then('output should be :output')]
    public function outputShouldBe(string $output): void
    {
        if (1 === count($this->output) && $this->output[0] === $output) {
            return;
        }

        throw new LogicException(sprintf(
            'Unexpected output: %s' . PHP_EOL,
            implode(PHP_EOL, $this->output)
        ));
    }
}
