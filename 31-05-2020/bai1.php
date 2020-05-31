<?php
class HocSinh{
    public $id;
    public $name;
    public $age;
    public $address;

    public function __construct($id,$name,$age,$address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function display(){
        echo "ID:".$this->id.", Name:".$this->name.", Age:".$this->age.", Address:"
            .$this->address."<br>";
    }

}
$h1 = new HocSinh(1,"Adam",26,"USA");
$h1->display();