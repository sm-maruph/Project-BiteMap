<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chatbox</title>
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
    color: orangered;
}

#chatbox {
    max-width: 600px;
    margin: 20px auto;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#chatbox div {
    margin-bottom: 10px;
}

#chatbox strong {
    color: #333;
}

#chatbox p {
    font-size: 12px;
    color: #888;
    margin-top: 5px;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>

<?php

include('header.php');
include('templete/db_connect.php'); 
$user_id = filter_var($user_id, FILTER_SANITIZE_STRING); 

$restaurant_id = isset($_GET['restaurant_id']) ? $_GET['restaurant_id'] : null;


$messages = getChatMessages($user_id, $restaurant_id);

//  retrieve chat messages
function getChatMessages($user_id, $restaurant_id) {
    global $conn;

    $sql = "SELECT m.*, IFNULL(u.first_name, 'User') AS sender_name,IFNULL(u.profile_picture, 'User Image') AS sender_image, r.restaurant_name,r.r_image
        FROM messages m
        LEFT JOIN user u ON m.sender_id = u.user_id
        LEFT JOIN restaurant r ON m.sender_id = r.restaurant_id
        WHERE (m.sender_id = ? AND m.receiver_id = ? AND m.sender_type = 'user' AND m.receiver_type = 'restaurant')
        OR (m.sender_id = ? AND m.receiver_id = ? AND m.sender_type = 'restaurant' AND m.receiver_type = 'user')
        ORDER BY m.timestamp ASC";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare statement failed: ' . $conn->error);
    }

    $stmt->bind_param("iiii", $user_id, $restaurant_id, $restaurant_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
<h2>User Chatbox</h2>


<div id="chatbox">
    <?php foreach ($messages as $message) : ?>
        <div>
            <?php if ($message['sender_type'] === 'restaurant') : ?>
                <strong><?='<img src="' . $message['r_image'] . '" alt="Profile Picture" class="round-image"> ' . $message['restaurant_name'] ?> :</strong>
            <?php else : ?>
                <strong><?='<img src="' . $message['sender_image'] . '" alt="Profile Picture" class="round-image"> ' . $message['sender_name'] ?> :</strong>
            <?php endif; ?>
            <?= $message['message'] ?>
            <p><?= $message['timestamp'] ?></p>
        </div>
    <?php endforeach; ?>
</div>


<!-- Form to send a new message -->
<form method="post" action="fuctions/send_user_message.php?restaurant_id=<?= $restaurant_id?>;">
    <input type="hidden" name="sender_id" value="<?= $user_id ?>">
    <input type="hidden" name="receiver_id" value="<?= $restaurant_id ?>">
    <input type="hidden" name="sender_type" value="user">
    <input type="hidden" name="receiver_type" value="restaurant">
    <label for="message">Message:</label>
    <textarea name="message" id="message" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" name="send_message" value="Send Message">
</form>

</body>
</html>
