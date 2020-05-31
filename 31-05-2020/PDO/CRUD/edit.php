<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php


$url =   "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$tokens = explode('/', $url);
$id = $tokens[sizeof($tokens)-1];
$serverName  = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
$firstname = '';
$lastname = '';
$email = '';
$age = '';
$location = '';
$create_at = '';
try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbh->prepare('SELECT * FROM `users` WHERE id = :id');
    $stmt->execute(array('id'=>$id));
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while($row= $stmt->fetch()){
//        echo $row['firstname'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $age = $row['age'];
        $location = $row['location'];
        $create_at = new DateTime($row['create_at']);
//        echo $create_at->format('d-m-Y');


    }


    $stmt = $dbh->prepare("UPDATE users set firstname=?,lastname=?,email=?,age=?,location=?,create_at=? where id=?") ;
    $stmt->bindParam(1,$firstNameedit);
    $stmt->bindParam(2,$lastNameedit);
    $stmt->bindParam(3,$emailedit);
    $stmt->bindParam(4,$ageedit);
    $stmt->bindParam(5,$locationedit);
    $stmt->bindParam(6,$create_atedit);
    $stmt->bindParam(7,$id);
    if(isset($_POST['submit'])){
//        echo 'a';
        if($_POST['firstName'] == '' || $_POST['lastName'] == '' ||
            $_POST['email'] == '' || $_POST['age'] == ''  || $_POST['location'] == '' ||$_POST['date'] == '' ){
            echo "Fully Infomation required";
        }else{
            $firstNameedit = $_POST['firstName'];
            $lastNameedit = $_POST['lastName'];
            $emailedit = $_POST['email'];
            $ageedit = $_POST['age'];
            $locationedit = $_POST['location'];
            $dateedit = $_POST['date'];
            $url =   "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $tokens = explode('/', $url);
            $id = $tokens[sizeof($tokens)-1];
            $stmt->execute();
            header("Location:../home.php");

        }
    }

}catch (PDOException $e){
    echo $e->getMessage();
}
?>
<form action="" method="POST">
    <table>
        <tr>
            <td>FirstName</td>
            <td><input type="text" name="firstName" value="<?php echo
                $firstname?>"></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type="text" name="lastName" value="<?php echo $lastname?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $email?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age" value="<?php echo $age?>"></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="location" value="<?php echo $location?>"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="date" value="<?php echo $create_at->format
                ('d-m-Y')?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Edit" name="submit"></td>
        </tr>
    </table>
</form>
<br><a href="../home.php">Home</a>
</body>
</html>