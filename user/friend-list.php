<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
</head>

<?php 
session_start();
include '../include/sidebar-friend-list.php';
include '../back-end/view-friends.php';

$username = $_SESSION['username'];

?>

<body>
<div class="main-content">
        <h1><?php echo "Friends Page" ?></h1>
        <h2><?php echo "Welcome " . $username . "!"; ?></h2>

        <!-- prints out user_id of current login at the moment -->
        <?php 
        $friendships = getFriendships($username); 
        if (!empty($friendships)) {
            echo "<table>";
            echo "<tr>
                    <th>Friendship ID</th>
                    <th>User1 ID</th>
                    <th>User2 ID</th>
                    <th>Status</th>
                    <th>Created At</th>
                  </tr>";
    
            foreach ($friendships as $friendship) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($friendship['friendship_id']) . "</td>";
                echo "<td>" . htmlspecialchars($friendship['user1_id']) . "</td>";
                echo "<td>" . htmlspecialchars($friendship['user2_id']) . "</td>";
                echo "<td>" . htmlspecialchars($friendship['status']) . "</td>";
                echo "<td>" . htmlspecialchars($friendship['created_at']) . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
        } else {
            echo "<p>No friends found.</p>";
        }
        ?>

        

    </div>
</body>
</html>