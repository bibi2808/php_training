<?php
require_once 'Cat.class.php';
class Lion extends Cat{
    public $height = '1m2';

    public function getheight(){
        return $this->height;
    }


    public function showInfor(){
        echo '</br>' . 'name: ' .$this->getName() .'</br>';
        echo 'color: ' .$this->getColor() .'</br>';
        echo 'age: ' .$this->getAge() .'</br>';
        echo 'height: ' .$this->getHeight() .'</br>';
    }
}