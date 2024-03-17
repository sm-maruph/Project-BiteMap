<?php 
session_start();
include("templete/db_connect.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the post text is not empty (you can add more validation as needed)
    if (!empty($_POST["post_text"])) {

        // Escape user inputs to prevent SQL injection
        $post_text = $conn->real_escape_string($_POST["post_text"]);

        // Process the uploaded image (you may want to add more image handling)
        $target_dir = "uploads/"; // Adjust the path as needed
        $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
        move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file);

        // Insert data into database
        $sql = "INSERT INTO user_post (post_content, post_image) VALUES ('$post_text', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Post submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Post text is required.";
    }

    header('Location: blog_main.php');
}
?>

