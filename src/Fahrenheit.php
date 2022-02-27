<?php

namespace Console;

use Console;

class Fahrenheit extends Scale{

    public function calcToCelsius(): float
    {
        return ((9/5)*$this->value)-459.67;
    }
    public function calcFromCelsius($val): float
    {
        return ((9/5)*$val)+32;
    }
}