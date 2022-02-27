<?php
namespace Console;

abstract class Scale{
    protected $name;
    protected $error;
    protected $scale_from;
    protected $scale_to;
    protected $value;
    protected $result;

    public function __construct($scale_from, $scale_to, $value)
    {
        $this->name = (new \ReflectionClass($this))->getShortName();
        $this->error = '';
        $this->scale_to = (string)$scale_to;
        $this->scale_from = (string)$scale_from;
        $this->value = (float)$value;
        $this->result = 0;
    }

    public function calculate() : bool
    {    
        if($this->scale_from == $this->name)
        {
            if($this->scale_from != $this->scale_to)
            {
                if($this->scale_to == 'Celsius')
                {
                    $this->result = $this->calcToCelsius();
                    return true;
                }
                else
                {
                    $class_src = __NAMESPACE__.'\\'.$this->scale_to;
                    if(class_exists($class_src))
                    {
                        $scale_to_obj = new $class_src($this->scale_from, $this->scale_to, $this->value);
                        $this->result = $scale_to_obj->calcFromCelsius($this->calcToCelsius());
                        return true;
                    }
                }
            }
            else
            {
                $this->result = $this->value;
                return true;
            }
        }
        else
        {
            $this->error = 'Jednostki miar nie sa zgodne';
            return false;
        }
        return false;
    }

    public function getResult()
    {
        return $this->result;
    }
    public function getErrorMsg()
    {
        return $this->error;
    }
    public function getValue()
    {
        return $this->value;
    }

    abstract public function calcToCelsius():float;
    abstract public function calcFromCelsius($val): float;
}
