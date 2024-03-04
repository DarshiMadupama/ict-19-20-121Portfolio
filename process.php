<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message =$_POST['message']

$conn = new mysqli('mysql','root','','form');

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into message(name,email,message)values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$message);
    $stmt->execute();
    echo "Sent message successfuly...";
    $stmt->close();
    $conn->close();
}
?>