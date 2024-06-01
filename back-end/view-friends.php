
<?php 

function getFriendships($username) {
    include '../database/db-connection.php';

    // Get the user_id of the logged-in username
    $query1 = "SELECT user_id FROM users WHERE username = ?";
    $stmt1 = $mysqli->prepare($query1);
    $stmt1->bind_param('s', $username);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    $friendships = [];

    if ($result1 && $row = $result1->fetch_assoc()) {
        $user_id = $row['user_id'];

        // Get the friendships information including the status
        $query2 = "SELECT user1_id, user2_id, status FROM friendships WHERE user1_id = ? OR user2_id = ?";
        $stmt2 = $mysqli->prepare($query2);
        $stmt2->bind_param('ii', $user_id, $user_id);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        // Fetch all usernames and statuses of friends linked to the logged-in account
        if ($result2) {
            while ($row = $result2->fetch_assoc()) {
                $friend_id = ($row['user1_id'] == $user_id) ? $row['user2_id'] : $row['user1_id'];
                $status = $row['status'];
                
                $query3 = "SELECT username FROM users WHERE user_id = ?";
                $stmt3 = $mysqli->prepare($query3);
                $stmt3->bind_param('i', $friend_id);
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                
                if ($result3 && $friend_row = $result3->fetch_assoc()) {
                    $friendships[] = [
                        'username' => $friend_row['username'],
                        'status' => $status
                    ];
                }
            }
        }
    }

    $mysqli->close();

    return $friendships;
}



?>
