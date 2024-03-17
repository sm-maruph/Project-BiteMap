<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers sign up to BiteMap</title>
    <link rel="stylesheet" type="text/css" href="CSS/signup.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>

<body>
<?php include('header.php') ?>
        <div class="signup ">
            <form id="form" method="post" action="./fuctions/signup.php" enctype="multipart/form-data" class="inner">
                <h6 class="logt">Customers Sign Up</h6>


                <!-- To display the success message -->
                <?php
                if (isset($_SESSION['registration_success'])) {
                    echo '<div class="success-message">';
                    echo '<p>' . $_SESSION['registration_success'] . '</p>';
                    echo '</div>';
                    unset($_SESSION['registration_success']); // Clear the success message after displaying
                }
                ?>
                <!-- Display errors if any -->
                <?php
                if (isset($_SESSION['signup_errors'])) {
                    $errors = $_SESSION['signup_errors'];
                    echo '<div class="error-message">';
                    echo '<p>' . $errors['email'] . '</p>';
                    echo '</div>';

                    // Clear the errors after displaying
                }
                ?>
                <div class="innerinner">
                    <div class="in">
                        <p>First Name : </p>
                        <input type="text" placeholder="First Name" name="first_name"
                            value="<?php echo isset($_SESSION['input_values']['first_name']) ? $_SESSION['input_values']['first_name'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Last Name : </p>
                        <input type="text" placeholder="Last Name" name="last_name"
                            value="<?php echo isset($_SESSION['input_values']['last_name']) ? $_SESSION['input_values']['last_name'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Email :</p>
                        <input type="text" placeholder="Email" name="email"
                            value="<?php echo isset($_SESSION['input_values']['email']) ? $_SESSION['input_values']['email'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Password : </p>
                        <input type="password" placeholder="Password" name="password"
                            value="<?php echo isset($_SESSION['input_values']['password']) ? $_SESSION['input_values']['password'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Address : </p>
                        <input type="text" placeholder="Address" name="address"
                            value="<?php echo isset($_SESSION['input_values']['address']) ? $_SESSION['input_values']['address'] : ''; ?>"
                            required>
                    </div>
                </div>
                <div class="innerinner">
                    <div class="in">
                        <p>Contact Number : </p>
                        <input type="text" placeholder="Contact Number" name="contact_number"
                            value="<?php echo isset($_SESSION['input_values']['contact_number']) ? $_SESSION['input_values']['contact_number'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Gender :</p>
                        <select name="gender" id="gender" >
                            <option value="#">SELECT YOUR GENDER</option>
                            <option value="MALE" <?php echo (isset($_SESSION['input_values']['gender']) && $_SESSION['input_values']['gender'] == 'MALE') ? 'selected' : ''; ?>>
                                MALE
                            </option>
                            <option value="FEMALE" <?php echo (isset($_SESSION['input_values']['gender']) && $_SESSION['input_values']['gender'] == 'FEMALE') ? 'selected' : ''; ?>>
                                FEMALE
                            </option>
                        </select>
                    </div>
                    <div class="in">
                    <label for="file-input">Select an image : </label>
                    <input type="file" name="profile_picture" value="<?php echo isset($_SESSION['input_values']['profile_picture']) ? $_SESSION['input_values']['profile_picture'] : ''; ?>"id ="file-input"accept ="image/*">
                </div>
                    <div class="log">
                        <button class="signup_button">Sign up</button>
                    </div>
                </div>


                <a href="login.php?key=1"></a>
            </form>

        </div>

    </div>
    <?php include('footer.php') ?>

</html>