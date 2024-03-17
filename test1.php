<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiteMap recharge</title>
    <link rel="stylesheet" href="CSS/header.css">
</head>
<body>
<?php include 'header.php'; ?>
<?php session_start(); ?>
<?php
include("templete/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rechargeAmount = $_POST['amount'];

    if (!is_numeric($rechargeAmount) || $rechargeAmount <= 0) {
        die("Invalid recharge amount");
    }

    $user_id = $_SESSION['user_id']; // Fix variable name
    $query = "SELECT curr_balance FROM user WHERE user_id = '$user_id'"; // Fix variable name
    $result = mysqli_query($conn, $query); // Use the correct variable for the database connection

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentBalance = $row['curr_balance'];

        $newBalance = $currentBalance + $rechargeAmount;
        $updateQuery = "UPDATE user SET curr_balance = '$newBalance' WHERE user_id = '$user_id'"; // Fix variable name
        $updateResult = mysqli_query($conn, $updateQuery); // Use the correct variable for the database connection

        if ($updateResult) {
            echo "Recharge successful! Your new balance is: $newBalance";
        } else {
            echo "Error updating balance";
        }
    } else {
        echo "Error retrieving user data";
    }
} else {
    // Redirect to the recharge form if accessed directly
    header("Location: recharge.php");
    exit();
}
?>

<div> <!-- Close the opening <div> tag -->

    <h2>Recharge Your Account</h2>
    
    <form action="" method="post">
        <label for="amount">Enter Amount:</label>
        <input type="number" name="amount" id="amount" required>
        <button type="submit">Recharge</button>
    </form>
</div>
</body>
</html>
