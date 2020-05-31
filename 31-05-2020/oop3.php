<?php
abstract class Animal{
    protected $name;
    abstract function run();
}

class Dog extends Animal{
    public function run()
    {
        echo "Dog is runnning<br>";
    }
}

class Person extends Animal{
    public function run()
    {
        echo "Human is running<br>";
    }
}

$dog1 = new Dog();
$person1 = new Person();

$dog1->run();
$person1->run();