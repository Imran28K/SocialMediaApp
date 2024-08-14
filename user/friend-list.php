<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body>

<?php 
session_start();
include '../include/sidebar-friend-list.php';
include '../back-end/view-friends.php';

$username = $_SESSION['username'];
?>

<div class="main-content">
    <h1><?php echo "Friends Page"; ?></h1>
    <h2><?php echo "Welcome " . htmlspecialchars($username) . "!"; ?></h2>

    <?php 
    $friendships = getFriendships($username); 
    if (!empty($friendships)) {
        echo "<table>";
        echo "<thead><tr>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
              </tr></thead><tbody>";

        foreach ($friendships as $friendship) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($friendship['username']) . "</td>";
            echo "<td>" . htmlspecialchars($friendship['status']) . "</td>";
            echo "<td><button>Unfriend</button></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>No friends found.</p>";
    }
    ?>
</div>
<script src="../js/navbar.js"></script>
</body>
</html>
