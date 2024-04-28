<?php 
session_start();
include '../database/db-connection.php'; 

if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, password FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){
    
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header("Location: ../user/home.php");

}
else{
    echo ("Wrong credentials");
}

$mysqli->close();
?>