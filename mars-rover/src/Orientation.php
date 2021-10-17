<?php

namespace Gquemener\MarsRover;

interface Orientation
{
    public function turnRight(): Orientation;

    public function turnLeft(): Orientation;

    public function asString(): string;
}
