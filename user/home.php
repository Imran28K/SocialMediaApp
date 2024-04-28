<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 
session_start();
include '../include/sidebar-home.php';

$username = $_SESSION['username'];
$password = $_SESSION['password'];


?>

<body>
    <div class="main-content">
        <h1><?php echo "Home Page" ?></h1>
        <h2><?php echo "Welcome " . $username . "!"; ?></h2>
        <h2><?php echo "Your password: " . $password; ?></h2>

    </div>
</body>
</html>

