<?php
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']

//Database connection 
.$conn = new mysqli('localhost','root', '', 'auxilium');
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
else {
    $stmt = $conn->prepare("insert into registration(fullname, username, email, password) values(?, ?, ?, ?,)");
    $stmt->bind_param("ssss",$fullname, $username, $email, $password);
    $stmt->execute();
    echo "Registration Successful...";
    $stmt->close();
    $conn->close();
}
?>