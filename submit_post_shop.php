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
        $target_dir = "../image/restaurant/uploads_shop/"; // Adjust the path as needed
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);  // Create the directory if it doesn't exist
          
        $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
        move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file);
        if (file_exists($target_file)) {
            $message['error'] = 'File already Exists';
            
        }
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error uploading image.";
            mysqli_close($conn);
            echo "Maruph";
            exit();
        }
        $result = substr($uploadFile, 3);

        // Insert data into database
        $sql = $conn->prepare("INSERT INTO `user_post`( `shop_name`, `post_content`, `post_image`) VALUES ('[value-1]','$post_text','$target_file')");

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

    header('Location: blog_main_shop.php');
}
}
?>

