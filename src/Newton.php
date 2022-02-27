<?php

namespace Console;

use Console;

class Newton extends Scale{

    public function calcToCelsius(): float
    {
        return $this->value*(33/100);
    }
    public function calcFromCelsius($val): float
    {
        return $val*0.33;
    }
}