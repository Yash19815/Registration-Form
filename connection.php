<?php
$username =$_POST['username'];
$password =$_POST['password'];
$email =$_POST['email'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO registration (firstname, email, password) values(?, ?, ?);");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    echo "Registered successfully";
    $stmt->close();
    $conn->close();
}
?>