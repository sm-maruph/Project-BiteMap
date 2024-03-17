<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reservation Home</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="CSS/header.css">

   <style>
    .container {
         max-width: 800px;
         margin: 20px auto;
         padding: 20px;
         background-color: #45a049;
         border: 1px solid #ccc;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    .checkout-form {
         text-align: center;
      }

      .heading {
         color: orangered;
      }

      .display-order {
         margin-top: 20px;
      }

      .display-order span {
         display: block;
         margin-bottom: 5px;
         color: orange;
         font-size: 20px;
      }

      .grand-total {
         display: block;
         margin-top: 10px;
         color: white;
         font-size: 30px;
         font-weight: bolder;
      }

      .btn {
         margin-top: 20px;
         display: flex;
         text-align: center;
         justify-content: center;
      }

      .btn a {
         display: inline-block;
         padding: 10px 20px;
         text-decoration: none;
         color: #fff;
         background-color: #4caf50;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         transition: background-color 0.3s ease, color 0.3s ease;
      }

      .btn a:hover {
         background-color: #45a049;
         color: #fff;
      }

      .btn a:active {
         transform: translateY(2px);
      }
   </style>

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

 <section class="checkout-form">

<h1 class="heading">COMPLETE YOUR RESERVATION</h1>

 <form action="" method="post">

   <div class="display-order">
   <?php
    include("templete/db_connect.php");

    function getProductName($conn, $product_id) {
      $product_name = ''; // Initialize the variable
  
      // Prepare and execute the SQL query
      $select_product_sql = "SELECT name FROM products WHERE id = ?";
      $stmt = $conn->prepare($select_product_sql);
  
      if (!$stmt) {
          // Handle the SQL statement preparation error
          die("Error in preparing the SQL statement: " . $conn->error);
      }
  
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
  
      // Bind the result and fetch the product name
      $stmt->bind_result($product_name);
      $stmt->fetch();
  
      // Close the statement
      $stmt->close();
  
      return $product_name;
  }

   // Get reservation ID from the URL
   $reservation_id = isset($_GET['reservation_id']) ? $_GET['reservation_id'] : null;

    // Fetch reservation details from the database
    $select_reservation_sql = "SELECT * FROM reservations WHERE reservation_id = ?";
    $stmt = $conn->prepare($select_reservation_sql);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $reservation = $result->fetch_assoc();

        // Display reservation information
        echo "<p>Reservation ID: {$reservation['reservation_id']}</p>";
        echo "<p>Reservation Time: {$reservation['reservation_time']}</p>";
        echo "<p>Number of Guests: {$reservation['num_of_guest']}</p>";
        echo "<p>Initial Payment: BDT. {$reservation['initial_payment']}</p>";
        echo "<p>Instruction: {$reservation['instruction']}</p>";
         $grand_total=$reservation['initial_payment'];
         $restaurant_id = $_GET['restaurant_id'];
        // Fetch chosen products and quantities from the reservation
        $chosen_products_array = explode(',', $reservation['chosen_products']);

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
                 echo "<li>You are reserving without selecting any Food: $item</li>";
             }
         }
     }
        echo '</ul>';
    } else {
        echo "<p>No reservation found with ID: $reservation_id</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

      </div>
      <button class="btn">
        <a href="card.php?reservation_id=<?php echo $reservation_id; ?>&grand_total=<?php echo $grand_total; ?>&restaurant_id=<?php echo $restaurant_id; ?>">Proceed To checkout</a>
    </button>
</button>
  </form>

 </section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>