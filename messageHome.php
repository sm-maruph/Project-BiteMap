
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chat Home</title>
    <link rel="stylesheet" href="CSS/header.css">
    
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

 h2 {
        text-align: center;
        color: white;
    }

    .button{
        height: 90px;
        width: 500px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 20px 0;
    }

    .message li {
        background-color: rgba(0, 0, 0, 0.9);
        margin: 5px 0;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
        font-size: 21px;
    }

    li:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    a {
        text-decoration: none;
        color: orangered;
    }

    a:hover {
        color: #007bff;
    }
</style>

</head>
<body>
<?php

include('header.php');
include('templete/db_connect.php'); 

$user_id = filter_var($user_id, FILTER_SANITIZE_STRING); 

// Retrieve distinct restaurant names that the user has chatted with
$restaurants = getDistinctRestaurants($user_id);


function getDistinctRestaurants($user_id) {
    global $conn;

    $sql = "SELECT DISTINCT r.restaurant_name,r.r_image, r.restaurant_id
            FROM messages m
            LEFT JOIN restaurant r ON m.receiver_id = r.restaurant_id
            WHERE m.sender_id = ? AND m.sender_type = 'user'
            ORDER BY m.timestamp ASC";

    $stmt = $conn->prepare($sql);
    // Check for errors during prepare
    if ($stmt === false) {
        die('Prepare statement failed: ' . $conn->error);
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>

<h2>User Chat Home</h2>

<div class="message">
<ul>
    <?php foreach ($restaurants as $restaurant) : ?>
        <li>
            <a href="userChatbox.php?restaurant_id=<?= $restaurant['restaurant_id'] ?>">
                <?='<img src="' . $restaurant['r_image'] . '" alt="Profile Picture" class="round-image"> '. $restaurant['restaurant_name']?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</div>
</div>
</body>
</html>
