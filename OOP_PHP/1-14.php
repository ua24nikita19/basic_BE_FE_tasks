<?php

class User
{
    protected $name, $age;

    public function __construct($age, $name)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    public function getName(){
        return $this->name;
    }

    public  function setName($value){
        $this->name = $value;
    }

    public function getAge(){
        return $this->age;
    }

    public  function setAge(int $value){
        $this->age = $value;
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
