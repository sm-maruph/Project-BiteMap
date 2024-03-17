<?php
include('templete/db_connect.php');
session_start();
$user_id = $_SESSION['user_id'];
$reservation_id = $_GET['reservation_id'];
$restaurant_id = $_GET['restaurant_id'];

// Prepare the query
$query = "SELECT first_name, last_name, email, phone_no, curr_balance FROM `user` WHERE `user_id` = ?";
$stmt = $conn->prepare($query);

// Check for errors in the prepare statement
if (!$stmt) {
    die('Error in SQL query: ' . $conn->error);
}

// Bind parameters and execute the statement
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Bind the result variables
$stmt->bind_result($firstname, $lastname, $email, $phoneNumber, $curr_balance);

// Fetch the result
$stmt->fetch();

// Simulate retrieving the total payable amount
$totalPayableAmount = isset($_GET['grand_total']) ? $_GET['grand_total'] : null; // Replace with the actual total payable amount
?>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('templete/db_connect.php');

    $user_id = $_POST['user_id'];
$restaurant_id = $_POST['restaurant_id'];
$amount = $_POST['amount'];
$reservation_id=$_POST['reservation_id'];
// Start a transaction
$conn->begin_transaction();

// Update the user's balance
$update_user_sql = "UPDATE user SET curr_balance = curr_balance - $amount WHERE user_id = $user_id";
$conn->query($update_user_sql);

// Get the restaurant's current balance
$get_restaurant_balance_sql = "SELECT curr_balance FROM restaurant WHERE restaurant_id = $restaurant_id";
echo $get_restaurant_balance_sql;
$result = $conn->query($get_restaurant_balance_sql);

if ($result) {
    $row = $result->fetch_assoc();
    $restaurant_balance = $row['curr_balance'];
    $result->close();
    
    // Update the restaurant's balance
    $new_restaurant_balance = $restaurant_balance + $amount;
    $update_restaurant_sql = "UPDATE restaurant SET curr_balance = $new_restaurant_balance WHERE restaurant_id = $restaurant_id";
    $conn->query($update_restaurant_sql);


    $payment_status = "UPDATE `reservations` SET `payment` = 'paid' WHERE reservation_id = '$reservation_id'";
$conn->query($payment_status);


    // Commit the transaction
    $conn->commit();

    echo "Payment successful. Balances updated.";
} else {
    // Rollback the transaction on error
    $conn->rollback();
    echo "Error updating balances: Error fetching restaurant balance.";
}
header('Location: cart.php');
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .balance-info {
            background-color: aliceblue;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .balance-info p {
            margin: 10px 0;
            transition: color 0.3s ease;
            color: black;
            font-size: 25px;
        }

        .balance-info p:hover {
            color: yellow;
            /* Change the color as per your design */
        }

        .insufficient-balance {
            color: #ff0000;
            font-weight: bold;
        }

        .payment-button {
            margin-top: 20px;
            /* Adjust the margin to your liking */
        }

        button {
            padding: 10px;
            margin: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: orangered;
        }
    </style>
</head>

<body>

    <?php
    if ($curr_balance >= $totalPayableAmount) {
        // Sufficient balance, allow payment
        echo "<div class='balance-info'>";
        echo "<p>Name: $firstname $lastname </p>";
        echo "<p>Email: $email </p>";
        echo "<p>Phone No: $phoneNumber</p>";
        echo "<p>Your BiteMap balance: BDT. $curr_balance</p>";
        echo "<p>Total payable amount: BDT. $totalPayableAmount</p>";



        echo "<form action='payment.php' method='post'>";
        echo "<input type='hidden' name='amount' value='$totalPayableAmount'>";
        echo "<input type='hidden' name='user_id' value='$user_id'>";
        echo "<input type='hidden' name='restaurant_id' value='$restaurant_id'>";
        echo "<input type='hidden' name='reservation_id' value='$reservation_id'>";

        echo "<button type='submit'>Pay with Balance</button>";
        echo "</form>";
        echo "</div>";

    } else {
        // Insufficient balance, display a message
        echo "<p class='insufficient-balance'>Insufficient balance. Please add funds to your account.</p>";

        echo "<div class='balance-info'>";
        echo "<p>Name: $firstname $lastname </p>";
        echo "<p>Email: $email </p>";
        echo "<p>Phone No: $phoneNumber</p>";
        echo "<p>Your BiteMap balance: BDT. $curr_balance</p>";
        echo "<p>Total payable amount: BDT. $totalPayableAmount</p>";
        echo "<button>Balance Recharge</button>";

    }

    // Close the statement
    $stmt->close();
    ?>

</body>

</html>