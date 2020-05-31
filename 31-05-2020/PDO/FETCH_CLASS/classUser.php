<?php
class Guest{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $reg_date;

//    function __construct()
//    {
//        if($this->email === 'hello@gmail.com'){
//            $this->lastName = 'Admin';
//        }
//    }
}


$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare('SELECT * FROM `myguest` WHERE firstname = :firstname');
    $stmt->setFetchMode(PDO::FETCH_CLASS,'Guest');

    $stmt->execute(array('firstname'=>'one'));
    while ($obj = $stmt->fetch()){
//        print_r($obj);
        echo $obj->id."<br>";
        echo $obj->firstname."<br>";
        echo $obj->lastname."<br>";
        echo $obj->email."<br>";
        echo $obj->reg_date."<br>";
        echo "===================<br>";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;