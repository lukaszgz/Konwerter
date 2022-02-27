<?php

namespace Console;

use Console;

class Kelvin extends Scale{

    public function calcToCelsius(): float
    {
        return $this->value-273.15;
    }
    public function calcFromCelsius($val): float
    {
        return $val+273.15;
    }

}