<!-- reset_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="post" action="functions/resetPassword.php">
                <h1 class="logt">Reset Password</h1>

                <!-- Display errors if any -->
                <?php
                session_start();
                if (isset($_SESSION['reset_password_errors'])) {
                    $errors = $_SESSION['reset_password_errors'];
                    echo '<div class="error-message">';
                    echo '<p>' . $errors['password'] . '</p>';
                    echo '</div>';
                    unset($_SESSION['reset_password_errors']); // Clear the errors after displaying
                }
                ?>

                <div class="in">
                    <p>New Password :</p>
                    <input type="password" placeholder="Enter your new password" name="new_password" required>
                </div>

                <button class="login_button" type="submit" name="submit_reset">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
