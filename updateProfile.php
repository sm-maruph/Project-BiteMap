<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="css/updateProfile.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>
<body>
    <?php include('header.php') ?>
    <?php
        include("templete/db_connect.php");
        // Fetch user information from the database
        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }

    ?>

    <div class="container">
        <div class="profile">
            <!-- Display current profile information -->
            <?php
            if ($fetch['profile_picture'] == '') {
                echo '<img src="image/default-avatar.png">';
            } else {
                echo '<img src="'.$fetch['profile_picture'].'">';
            }
            ?>
            <h3><?php echo $fetch['first_name'] . ' ' . $fetch['last_name']; ?></h3>
            <form action="fuctions/userProfileUpdate.php" method="post" enctype="multipart/form-data">
                <!-- Add input fields for updating information -->
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $fetch['first_name']; ?>" required>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $fetch['last_name']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $fetch['email']; ?>" required>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $fetch['address']; ?>" required>

                <label for="phone_no">Phone Number:</label>
                <input type="tel" name="phone_no" value="<?php echo $fetch['phone_no']; ?>" required>

                <label for="gender">Gender:</label>
                <select name="gender" required>
                    <option value="Male" <?php echo ($fetch['Gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($fetch['Gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>

                <label for="file-input">Select an image : </label>
                    <input type="file" name="profile_picture">

                <!-- Add more input fields for other information -->

                <button type="submit" name="update_profile" value="Update Profile">Update Profile</button>
            </form>
        </div>
    </div>
</div>
<div class="new">
    <h1>New Div</h1>
</div>
    <?php include('footer.php') ?>
</body>
</html>
