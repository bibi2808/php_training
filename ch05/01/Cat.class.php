<?php

class Cat{
    public $name;
    public $color;
    public $age;

    // public function __construct(){
    //     echo __METHOD__;
    //     $this->name = 'Kitty';
    //     $this->color = 'Red';
    //     $this->age ='2';
    // }

    public function __construct($name = 'Doraemon', $color = 'color', $age = '2'){
        echo __METHOD__;
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
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
        echo 'name: ' .$this->getColor() .'</br>';
        echo 'name: ' .$this->getAge() .'</br>';
    }
}