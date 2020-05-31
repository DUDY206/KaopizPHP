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
<form action="create.php" method="POST">
    <table>
        <tr>
            <td>FirstName</td>
            <td><input type="text" name="firstName"></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type="text" name="lastName"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" name="age"></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="location"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="datetime-local" name="date"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Create" name="submit"></td>
        </tr>
    </table>
</form>
<?php



    $serverName  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydbpdo";

    try {
        $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("INSERT INTO users(firstname,lastname,email,age,location,create_at) VALUES (?,?,?,?,?,?)");
        $stmt->bindParam(1,$firstName);
        $stmt->bindParam(2,$lastName);
        $stmt->bindParam(3,$email);
        $stmt->bindParam(4,$age);
        $stmt->bindParam(5,$location);
        $stmt->bindParam(6,$create_at);

        if(isset($_POST['submit'])){
//        echo 'a';
            if($_POST['firstName'] == '' || $_POST['lastName'] == '' ||
                $_POST['email'] == '' || $_POST['age'] == ''  || $_POST['location'] == '' ||$_POST['date'] == '' ){
                echo "Fully Infomation required";
            }else{
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $location = $_POST['location'];
                $date = $_POST['date'];
                $stmt->execute();
                header("Location:home.php");
                echo "Create user".$firstName." ".$lastName."successfully";

            }
        }

    }catch (PDOException $e){
        echo $e->getMessage();
    }
?>
<br><a href="home.php">Home</a>
</body>
</html>