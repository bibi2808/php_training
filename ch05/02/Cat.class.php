<?php

class Cat{
    public $name;
    public $color;
    public $age;

    public function __construct($array){
        echo __METHOD__;
        $this->name = $array['name'];
        $this->color = $array['color'];
        $this->age = $array['age'];
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name = $name;
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        return $this->color = $color;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        return $this->age = $age;
    }

    public function showInfor(){
        echo 'name: ' .$this->getName() .'</br>';
        echo 'color: ' .$this->getColor() .'</br>';
        echo 'age: ' .$this->getAge() .'</br>';
    }
}