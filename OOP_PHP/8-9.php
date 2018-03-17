<?php

class Worker
{

    private $name, $age, $salary;

    public function __construct($name, $age, $salary)
    {
        $this->__set('name', $name);
        $this->__set('age', $age);
        $this->__set('salary', $salary);
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}

$objIvan = new Worker('Ivan', 22, 4000);
echo '<b>Иван:</b> Возраст * зарплата = ' . $objIvan->__get('age') * $objIvan->__get('salary');