<?php


$serverName  = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bindParam(1,$id);
    $url =   "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $tokens = explode('/', $url);
    $id = $tokens[sizeof($tokens)-1];
    $stmt->execute();
    header("Location:../home.php");

}catch (PDOException $e){
    echo $e->getMessage();
}
?>