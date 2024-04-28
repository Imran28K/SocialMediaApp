
<?php 

function getFriendships($username) {
    include '../database/db-connection.php';

    $query1 = "SELECT user_id FROM users WHERE username = '$username'";
    $result1 = $mysqli->query($query1);
    
    $friendships = [];
    
    if ($result1) {

        $row = $result1->fetch_assoc();
        $user_id = $row['user_id'];
        
        $query2 = "SELECT * FROM friendships WHERE user1_id = '$user_id' OR user2_id = '$user_id'";
        $result2 = $mysqli->query($query2);
        
        if ($result2) {
            while ($row = $result2->fetch_assoc()) {
                $friendships[] = $row;
            }
        }
    }

    //i will use this to select username of user1's friend

   
    $mysqli->close();
    
    
    return $friendships;
}



/*
include '../database/db-connection.php'; 

$username = $_SESSION['username'];

$query1 = "SELECT user_id FROM users WHERE username='$username'";
$result1 = $mysqli->query($query1);

if($result1){
    while($row = $result1->fetch_assoc()){
        echo "User ID: " . $row['user_id'] . "\n";
        $user_id = $row['user_id'];

        $query2 = "SELECT * FROM friendships WHERE user_id='$user_id' "
        $result2 = $mysqli->query($query2);

        while($row = $result2->fetch_assoc()){
           
        }


    }
}
else{
    echo "Error: " . $mysqli->error;
}
*/
?>
