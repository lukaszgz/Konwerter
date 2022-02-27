<?php

namespace Console;

use Console;

class Celsius extends Scale{

    public function calcToCelsius(): float
    {
        return $this->value;
    }
    public function calcFromCelsius($val): float
    {
        return $val;
    }
}