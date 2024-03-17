

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chatbox</title>
    <link rel="stylesheet" href="CSS/header.css">
</head>

<body>
    <?php
    include('header.php');
    include('templete/db_connect.php'); 
    $user_id = filter_var($user_id, FILTER_SANITIZE_STRING); 
    $restaurant_id = 95;
    ?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['reviewText'];
    $user_id = $_POST['user_id'];
    $restaurant_id = $_POST['restaurant_id'];

    // Check if the review text is not empty
    if (!empty($text)) {
        // Prepare and execute the SQL statement to insert a review
        $insertStmt = $conn->prepare("INSERT INTO review (user_id, restaurant_id, review_text) VALUES (?, ?, ?)");

        if ($insertStmt) {
            $insertStmt->bind_param("iis", $user_id, $restaurant_id, $text);

            if ($insertStmt->execute()) {
                echo "Review submitted successfully";
                
                // Redirect to a different page after successful submission
                header("Location: review.php");
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                echo "Error: " . $insertStmt->error;
            }

            $insertStmt->close();
        } else {
            echo "Error preparing the insert statement: " . $conn->error;
        }
    } else {
        echo "Review text is required.";
    }
}
$sql = "SELECT r.*, u.* FROM review r
        JOIN user u ON r.user_id = u.user_id
        WHERE r.restaurant_id = ?
        ORDER BY r.timestamp DESC
        LIMIT 20";
$selectStmt = $conn->prepare($sql);

if ($selectStmt) {
    $selectStmt->bind_param("i", $restaurant_id);
    $selectStmt->execute();

    $result = $selectStmt->get_result();

    if ($result->num_rows > 0) {
        // Display reviews
        while ($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row['first_name'] ." ".$row['last_name']. "</p>";
            echo "<p>Review Text: " . $row['review_text'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No reviews found for this restaurant.";
    }

    $selectStmt->close();
} else {
    echo "Error preparing the select statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>




    <!-- Form to send a new message -->
    <form method="post" action=" ">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="restaurant_id" value="<?= $restaurant_id ?>">
        <label for="reviewText">Enter your Review:</label>
        <textarea name="reviewText" id="reviewText" rows="8" cols="50" required></textarea>
        <br>
        <input type="submit" value="Submit Review">
    </form>
</body>
</html>
