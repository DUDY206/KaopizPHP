<?php
$serverName  = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";
try{
    $dbh = new PDO("mysql:host=$serverName;dbname=$dbname",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //create data table users

//    $stmt = $dbh->prepare("INSERT INTO users(firstname,lastname,email,age,location,create_at) VALUES (?,?,?,?,?,?)");
//    $stmt->bindParam(1,$firstname);
//    $stmt->bindParam(2,$lastname);
//    $stmt->bindParam(3,$email);
//    $stmt->bindParam(4,$age);
//    $stmt->bindParam(5,$location);
//    $stmt->bindParam(6,$create_at);
//
//    for($i = 2;$i<10;$i++){
//        $firstname = 'firstname'.$i;
//        $lastname = 'lastname'.$i;
//        $email = 'email'.$i;
//        $age = 22;
//        $location = 'HaNoi';
//        $create_at = '2020/1/1';
//
//        $stmt->execute();
//    }
//
//
//    echo "Insert MyGuest succesfully<br>";

    //show data table user
    echo "<table><tr><th>ID<th><th>FirstName<th><th>LastName<th><th>Email<th><th>Age<th><th>Location<th><th>Date<th><th>Option<th><tr>";

    $sth = $dbh->query('SELECT * FROM `users`');
    //Returns an associative array of strings representing the fetched row. NULL if there are no more rows in result-set
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    while ($row= $sth->fetch()){
        echo "<tr><td>".$row['id']."<td>";
        echo "<td>".$row['firstname']."<td>";
        echo "<td>".$row['lastname']."<td>";
        echo "<td>".$row['email']."<td>";
        echo "<td>".$row['age']."<td>";
        echo "<td>".$row['location']."<td>";
        echo "<td>".$row['create_at']."<td>";
        echo "<td><a href=edit/".$row['id'].">Edit</a><a href=delete/".$row['id'].">Delete</a><td>";
        echo "<tr>";
    }

    echo "<table><a href='home'>Back to home</a>";

}catch (PDOException $e){
    echo $e->getMessage();
}

$conn = null;