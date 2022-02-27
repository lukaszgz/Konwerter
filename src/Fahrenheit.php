<?php

namespace Console;

use Console;

class Fahrenheit extends Scale{

    // public function calc($scale_from, $value) :float
    // {
    //     switch ($scale_from) {
    //         case 'Kelvin':
    //             return ((9/5)*$value)-459.67;
    //             break;
    //         case 'Celsius':
    //             return ((9/5)*$value)+32;
    //             break;
    //         default:
    //             $this->error = "Brak odpowiedniego przelicznika";
    //             break;
    //     }
    //     return 0;
    // }

    public function calcToCelsius(): float
    {
        return ((9/5)*$this->value)-459.67;
    }
    public function calcFromCelsius($val): float
    {
        return ((9/5)*$val)+32;
    }
}