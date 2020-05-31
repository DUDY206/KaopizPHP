<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $dbh->query('SELECT * FROM `myguest`');
    //Returns an associative array of strings representing the fetched row. NULL if there are no more rows in result-set
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    print_r($sth) ;
    while ($row= $sth->fetch()){
        echo $row['id']."<br>";
        echo $row['firstname']."<br>";
        echo $row['lastname']."<br>";
        echo $row['email']."<br>";
        echo $row['reg_date']."<br>=================<br>";

    }


} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;