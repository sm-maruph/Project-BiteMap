<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="css/userProfile.css">
  <link rel="stylesheet" href="CSS/footer.css">
</head>
<body>
<?php include('header.php') ?>
<?php
include("templete/db_connect.php");
include("fuctions/userProfile.php");
?>
<?php
    if (!empty($_SESSION['user_id'])) {
        
    
?>
    <div class="container">
        <div class="profile">
            <?php
            // Fetch user information from the database
            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }

            // Display profile information
            if ($fetch['profile_picture'] == '') {
                echo '<img src="image/default-avatar.png">';
            } else {
                echo '<img src="'.$fetch['profile_picture'].'">';
            }
            ?>
            <h3><?php echo $fetch['first_name']; ?> <?php echo $fetch['last_name']; ?></h3>
            <h4>Email : <?php echo $fetch['email']; ?></h4>
            <h4>Address : <?php echo $fetch['address']; ?></h4>
            <h4>Contact no : <?php echo $fetch['phone_no']; ?></h4>
            <h4>Gender : <?php echo $fetch['Gender']; ?></h4>
            <h4>Being with us till <?php echo $fetch['signup_time']; ?></h4>
            <a href="updateProfile.php" class="btn">Update Profile</a>
            <a href="userProfile.php?confirm_delete=<?php echo $user_id; ?>" class="delete-btn" onclick="return confirm('Are you sure to delete your account?')">Delete Account</a>        </div>
        
    </div>
    <div><?php
    if (isset($_GET['confirm_delete'])) {
    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM `user` WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Deletion successful, unset the user_id from the session and redirect
        unset($_SESSION['user_id']);
        session_destroy();
        header('location: bitemap.php');
        exit;
    } else {
        // Deletion failed, handle the error as needed
        echo "Error deleting user account: " . $stmt->error;
        exit;
    }
}
?>


</div>
</div>
<div>
    <h3>hello</h3>
</div>
<?php include('footer.php') ?>
<?php }?>
</body>
</html>
