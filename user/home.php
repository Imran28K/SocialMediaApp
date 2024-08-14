<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<?php 
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : 'N/A';
?>

<body>
    <?php include '../include/sidebar-home.php'; ?>
    <div class="main-content">
        <h1><?php echo "Home Page"; ?></h1>
        <h2><?php echo "Welcome " . $username . "!"; ?></h2>
        <h2><?php echo "Your password: " . $password; ?></h2>
    </div>
    <script src="../js/navbar.js"></script>
</body>
</html>


