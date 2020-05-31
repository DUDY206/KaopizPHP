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
<form action="find" method="post">
    <input type="text" name="location" value="<?php if(isset($_POST['location'])) echo
    $_POST['location']; else echo '';
    ?>">
    <input type="submit" value="Search" name="submit">

    <?php
        $serverName  = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydbpdo";

        $dbh = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare('SELECT * FROM `users` WHERE location LIKE :location');


        if (isset($_POST['submit'])){
            $location = '%'.$_POST['location'].'%';
            $stmt->execute(array('location'=>$location));
            echo "<table><tr><th>ID<th><th>FirstName<th><th>LastName<th><th>Email<th><th>Age<th><th>Location<th><th>Date<th><th>Option<th><tr>";
            while ($row= $stmt->fetch()){
                echo "<tr><td>".$row['id']."<td>";
                echo "<td>".$row['firstname']."<td>";
                echo "<td>".$row['lastname']."<td>";
                echo "<td>".$row['email']."<td>";
                echo "<td>".$row['age']."<td>";
                echo "<td>".$row['location']."<td>";
                echo "<td>".$row['create_at']."<td>";
                echo "<td><a href=edit/".$row['id'].">Edit</a><button>Delete</button><td>";
                echo "<tr>";
            }

            echo "<table><a href='home'>Back to home</a>";
        }
    ?>
</form>
</body>
</html>
