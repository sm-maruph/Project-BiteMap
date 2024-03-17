<!-- forgot_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiteMap - Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="post" action="functions/forgotPassword.php">
                <h1 class="logt">Forgot Password</h1>

                <!-- Display errors if any -->
                <?php
                session_start();
                if (isset($_SESSION['forgot_password_errors'])) {
                    $errors = $_SESSION['forgot_password_errors'];
                    echo '<div class="error-message">';
                    echo '<p>' . $errors['email'] . '</p>';
                    echo '</div>';
                    unset($_SESSION['forgot_password_errors']); // Clear the errors after displaying
                }
                ?>

                <div class="in">
                    <p>Email :</p>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>

                <button class="login_button" type="submit" name="reset_password">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>