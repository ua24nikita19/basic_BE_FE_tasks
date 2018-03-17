<?php

class User
{
    protected $name, $age;

    public function __construct($age, $name)
    {
        $this->__set('age', $age);
        $this->__set('name', $name);
    }

    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
        return null;
    }
}

class Workers extends User
{
    private $salary;

    public function setSalary($value)
    {
        $this->salary = $value;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

class student extends User
{
    private $grants, $course;

    public function setGrants($value)
    {
        if (property_exists($this, 'grants') && is_int($value)) {
            $this->grants = $value;
        }
    }

    public function setCourse($value)
    {
        if (property_exists($this, 'course') && is_int($value)) {
            $this->course = $value;
        }
    }

    public function getGrants()
    {
        if (property_exists($this, 'grants')) {
            return $this->grants;
        }
        return null;
    }

    public function getCourse()
    {
        if (property_exists($this, 'course')) {
            return $this->course;
        }
        return null;
    }
}

class Driver extends Workers
{
    private $category, $drivingExperience;

    public function setCategory($value)
    {
        if (property_exists($this, 'category')) {
            $this->category = $value;
        }
    }

    public function setDrivingExperience($value)
    {
        if (property_exists($this, 'drivingExperience') && is_int($value)) {
            $this->drivingExperience = $value;
        }
    }

    public function getDrivingExperience()
    {
        if (property_exists($this, 'drivingExperience')) {
            return $this->drivingExperience;
        }
        return null;
    }

    public function getCategory()
    {
        if (property_exists($this, 'category')) {
            return $this->category;
        }
        return null;
    }
}

$objIvan = new Workers(20, 'Ivan');
$objIvan->setSalary(2000);

$objVasya = new Workers(21, 'Vasya');
$objVasya->setSalary(2500);

$objDima = new student(19, 'Dima');
$objDima->setCourse(3);
$objDima->setGrants(1000);

$objPetya = new Driver(30, 'Petya');
$objPetya->setCategory('A');
$objPetya->setDrivingExperience(10);
$objPetya->setSalary(10000);

echo 'Sum salary: ' . ($objVasya->getSalary() + $objIvan->getSalary()) . '<br><br>';

echo 'Dima\'s grants:<i>' . $objDima->getGrants() . '</i> and course:<i>' . $objDima->getCourse() . '</i><br>';

echo '<br>Имя:' . $objPetya->__get('name')
    . '<br>Возраст:' . $objPetya->__get('age')
    . '<br>Категория:' . $objPetya->getCategory()
    . '<br>Водительский стаж:' . $objPetya->getDrivingExperience();
