<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BiteMap Login</title>
  <link rel="stylesheet"type="text/css" href="CSS/login.css">
</head>
<body>

  <div class="wrapper">
    <h1 class="logt">BITE<span>MAP</span></h1>
    <form method="post" action="fuctions/login.php">
      <h2>Login</h2>
      <!-- Display errors if any -->
      <?php
      session_start();
      if (isset($_SESSION['login_errors'])) {
          $errors = $_SESSION['login_errors'];
          echo '<div class="error-message">';
          echo '<p>' . $errors['email'] . '</p>';
          echo '<p>' . $errors['password'] . '</p>';
          echo '</div>';
          unset($_SESSION['login_errors']); // Clear the errors after displaying
      }
      ?>
        <div class="input-field">
        <input type="text" name="email" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="http://localhost/project/forgetPassword.php">Forgot password?</a>
      </div>
      <button type="submit"type="submit" name="login">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="signuphome.php">Register</a></p>
      </div>
    </form>
  </div>

</body>
</html>

