<?php

//Задания с 1 по 7

class Worker
{

    private $name, $age, $salary;

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    private function checkSetAge($age)
    {
        if ($age > 0 && $age < 100) {
            $this->__set('age', $age);
        }
    }
    //Создал этот метод так как в задании нужно изменить возраст с помощью private checkSetAge метода, но он будет
    //недоступен вне класса
    public function checkSetAge2($age)
    {
        $this->checkSetAge($age);
    }
}

$objIvan = new Worker;
$objRoman = new Worker;

$objIvan->__set('name', 'Ivan');
$objIvan->__set('age', '20');
$objIvan->__set('salary', '3000');

$objRoman->__set('name', 'Roman');
$objRoman->__set('age', '20');
$objRoman->__set('salary', '4000');

$objIvan->checkSetAge2(99);
echo $objIvan->__get('age');