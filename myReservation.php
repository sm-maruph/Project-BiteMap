<?php
function getProductName($conn, $product_id) {
    $product_name = ''; 

    
    $select_product_sql = "SELECT name FROM products WHERE id = ?";
    $stmt = $conn->prepare($select_product_sql);

    if (!$stmt) {
        
        die("Error in preparing the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    
    $stmt->bind_result($product_name);
    $stmt->fetch();

    
    $stmt->close();

    return $product_name;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed reservation</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="restaurant/cssRestaurant/pendingReservation.css">




</head>
<body>

<?php include 'header.php' ?>





<?php
if (!isset($user_id)) {
   header('location:bitemap.php');
   exit(); 
}

$message = []; 


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_reservation = $conn->prepare("DELETE FROM `reservations` WHERE reservation_id = ?");
 
    if ($delete_reservation === false) {
       die('Error preparing the update statement: ' . $conn->error);
   }
   
 
    $delete_reservation->bind_param("i", $delete_id); 
    $executed = $delete_reservation->execute();
 
    if ($executed) {
       header('location:myReservatio..php');
       exit(); 
    } else {
       $message[] = 'Error deleting order: ' . $delete_reservation->error;
    }
 }
?>

<section class="placed-orders">

   <h1 class="heading">My reservations </h1>

   <div class="box-container">

<?php
   $select_reservation = $conn->prepare("SELECT *
   FROM `reservations`
   INNER JOIN `restaurant` ON reservations.restaurant_id = restaurant.restaurant_id
   WHERE `user_id` =$user_id");
   if (!$select_reservation) {
      die("Error preparing query: " . $conn->error);
   }

   $executed = $select_reservation->execute();
   if (!$executed) {
      die("Error executing query: " . $select_reservation->error);
   }

   $result = $select_reservation->get_result();

   if ($result->num_rows > 0) {
      while ($fetch_reservation = $result->fetch_assoc()) {
?>
<div class="box show">
   <p> Restaurant Name : <span><?= $fetch_reservation['restaurant_name']; ?></span> </p>
   <p> Reservation placed on : <span><?= $fetch_reservation['reservation_time']; ?></span> </p>



   <p> Area : <span><?= $fetch_reservation['policeStaion'] ; ?></span> </p>
   <p> Email : <span><?= $fetch_reservation['email']; ?></span> </p>
   <p>Contact Number : <span><?= $fetch_reservation['contactNumber1']; ?></span> </p>
   <p> Initial Payment : BDT. <span><?= $fetch_reservation['initial_payment']; ?></span> </p>
   <p> Reservation Status <span><?= $fetch_reservation['status']; ?></span> </p>
   <p> Payment Status <span><?= $fetch_reservation['payment']; ?></span> </p>

   <?php

            // Fetch chosen products and quantities from the reservation
            $chosen_products_array = explode(',', $fetch_reservation['chosen_products']);
            // Display the selected products within an HTML list
            echo '<ul>';
            if (isset($chosen_products_array)) {
                foreach ($chosen_products_array as $item) {
                    // Each item is in the format "product_id:quantity"
                    $itemParts = explode(':', $item);
            
                    // Check if the array has at least two elements
                    if (count($itemParts) >= 2) {
                        // Get the product_id and quantity
                        $product_id = $itemParts[0];
                        $quantity = $itemParts[1];
            
                        // Get the product name using the product ID
                        $product_name = getProductName($conn, $product_id);
            
                        // Display the product name and quantity in an HTML list item
                        echo "<li>Product: $product_name, Quantity: $quantity</li>";
                    } else {
                        // Handle the case where the item format is incorrect
                        echo "<li>No Food were selected: $item</li>";
                    }
                }
            }
            echo '</ul>';
            ?>
            <form action="" method="POST">
            <div class="flex-btn">
         <a href="myReservation.php?delete=<?= $fetch_reservation['reservation_id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </form>
      </div>
</div>

<?php
   }
} else {
   echo '<p class="empty">no orders placed yet!</p>';
}
?>

</section>
</div>












<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>