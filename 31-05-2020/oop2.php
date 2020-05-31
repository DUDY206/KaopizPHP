<?php
interface Move{
    function run();
}

class Dog implements Move{
    public function run()
    {
        echo "Dog is running<br>";
    }
}
class Car implements Move{
    public function run()
    {
        echo "Car is running<br>";
    }
}

$dog1 = new Dog();
$car1 = new Car();

$dog1->run();
$car1->run();