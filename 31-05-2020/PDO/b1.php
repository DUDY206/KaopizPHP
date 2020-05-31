<?php
$serverName  = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
try{
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare("INSERT INTO myguest(firstname,lastname) VALUES (?,?)");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$value);

    $name = 'one';
    $value = 1;
    $stmt->execute();

    $name = 'one';
    $value = 1;
    $stmt->execute();

    echo "Insert MyGuest succesfully<br>";

    //      exec
    //      Execute an SQL statement and return the number of affected rows
    //      execute
    //      Executes a prepared statement
    //      you cannot bind two values to a single named parameter
    //      query
    //      Executes an SQL statement, returning a result set as a PDOStatement object
}catch (PDOException $e){
    echo $e->getMessage();
}

$conn = null;