<?php
session_start();
include('templete/db_connect.php');

// Check if the user is logged in
if (empty($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}

// Fetch restaurant details
$restaurant_id = isset($_GET['restaurant_id']) ? $_GET['restaurant_id'] : null;
if (!$restaurant_id) {
    // Redirect to the home page if restaurant ID is not provided
    header('Location: bitemap.php');
    exit();
}

// Fetch restaurant details based on the provided restaurant_id
$stmt = $conn->prepare("SELECT * FROM restaurant WHERE restaurant_id = ?");
$stmt->bind_param("i", $restaurant_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $restaurant = $result->fetch_assoc();
    $restaurant_name = $restaurant['restaurant_name'];
} else {
    // Redirect to the home page if the restaurant is not found
    header('Location: bitemap.php');
    exit();
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Reservation</title>
    <link rel="stylesheet" href="CSS/header.css">

    <link rel="stylesheet" href="CSS/cart.css">
</head>

<body>
<?php include 'header.php'; ?>
<div class="welcome">
            <h2>You are now making a Reservation for
                <?php echo $restaurant_name; ?><br>
            </h2>
        </div>

    <section class="show-products" style="padding-top: 0;">
        <h3>Our Menu For You</h3>
        <div class="box-container">
            <?php
            // Initialize grand total
            $grandTotal = 300;

            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT p.*, r.* FROM products AS p JOIN restaurant AS r ON p.restaurant_id = r.restaurant_id WHERE r.restaurant_id = ?");

            // Check for errors during prepare
            if ($stmt === false) {
                die('Prepare statement failed: ' . $conn->error);
            }

            // Assuming $restaurant_id holds the desired restaurant ID
            $stmt->bind_param("i", $restaurant_id);

            // Execute the query
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Check if the query execution was successful
            if ($result === false) {
                die('Query execution failed: ' . $conn->error);
            }

            // Check if products were found
            if ($result->num_rows > 0) {
                while ($fetch_products = $result->fetch_assoc()):
                    $productId = htmlspecialchars($fetch_products['id']);

                    // Get quantity from the session if available
                    $quantity = isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId] : 0;

                    // Calculate product total
                    $productTotal = $fetch_products['price'] * $quantity;

                    // Update grand total
                    $grandTotal += $productTotal;
                    ?>
                    <div class="box">
                        <img src="restaurant/<?= htmlspecialchars($fetch_products['image']); ?>" alt="">
                        <div class="flex">
                            <div class="price">
                                <span>Price BDT. </span>
                                <?= htmlspecialchars($fetch_products['price']); ?><span>/-</span>
                            </div>
                            <div class="category"><span></span>
                                <?= htmlspecialchars($fetch_products['category']); ?>
                            </div>
                        </div>
                        <div class="name">
                            <?= htmlspecialchars($fetch_products['name']); ?>
                        </div>

                        <!-- Add input box for quantity -->
                        <form action="update_cart.php" method="post">
                            <input type="hidden" name="productId" value="<?= $productId ?>">
                            <div class="quantity">
                                <label for="quantity<?= $productId ?>">Quantity:</label>
                                <input type="number" id="quantity<?= $productId ?>" name="quantity[<?= $productId ?>]" min="0"
                                    value="<?= $quantity ?>">
                            </div>

                            <!-- Add button for updating grand total -->
                            <button type="submit" name="updateTotal">Update Total</button>
                        </form>

                        <!-- Display product total -->
                        <div class="product-total">
                            <span>Product Total: BDT.
                                <?= $productTotal ?>/-
                            </span>
                        </div>
                    </div>
                    <?php
                endwhile;
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $conn->close();
            ?>
        </div>

        <!-- Display grand total -->
        <div class="grand-total">
    <?php
    
    if ($grandTotal > 600) {
        
        $grandTotal = $grandTotal - 300;
        echo '<h4>Grand Total: BDT. ' . $grandTotal . '/-</h4>';
    } else {
        
        echo '<h4>Grand Total: BDT. ' . $grandTotal . '/-</h4>';
    }
    ?>
</div>


    </section>


    <div class="container">
        <div class="welcome">
            <h2>Please fillup the form carefully</h2>
            <P>your initial Payment will be charge for reservation and it will be merged with your final payment</P>
        </div>
        <form action="fuctions/process_reservation.php" method="post">
            <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id; ?>">

            <label for="reservation_time">Reservation Time (required):</label>
            <input type="datetime-local" name="reservation_time" required>

            <label for="num_of_guest">Number of Guest (required):</label>
            <input type="number" name="guest" step="1" required>

            <label for="initial_payment">Initial Payment (BDT):</label>
            <input type="number" name="initial_payment" step="0.01"value="<?php echo $grandTotal; ?>">

            <label for="instruction">Any Instruction ? (optional):</label>
            <input type="text" name="instruction">
            <input type="hidden" name="grand_total" value="<?php echo $grandTotal; ?>">
            <button type="submit">Submit Reservation</button>

        </form>

    </div>


    </body>

    </html>
