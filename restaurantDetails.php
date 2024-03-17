<?php
include("templete/db_connect.php");

// Retrieve session values

$restaurant_name = isset($_GET['restaurant_name']) ? $_GET['restaurant_name'] : '';

$restaurant_id = isset($_GET['restaurant_id']) ? $_GET['restaurant_id'] : '';
//echo $restaurant_id;
$policeStation = isset($_GET['policeStation']) ? $_GET['policeStation'] : '';
$contact_number = isset($_GET['contact_number']) ? $_GET['contact_number'] : '';
$details_address = isset($_GET['details_address']) ? $_GET['details_address'] : '';
$map = isset($_GET['map']) ? $_GET['map'] : '';
$image = isset($_GET['r_image']) ? $_GET['r_image'] : '';

// Output the retrieved values in the HTML content
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reservation.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-GLhlTQ8i9GZlD9Pe6nLEHxx7z7jpjq6LQxVer/6Za4MQu/6szfcXpDg2EUpX+NMl" crossorigin="anonymous">
</head>

<body>
    <?php include('header.php') ?>
    <div class="welcome">
        <p>Welcome to <?php echo $restaurant_name; ?></p>
    </div>

    <div class="two-columns">
        <div class="inner">
            
            <p>
                <i class="fas fa-map-marker-alt" style="font-size: 24px;"></i> <!-- Font Awesome location icon -->
                Area:
                <?php echo $policeStation; ?>
            </p>
            <p>
                <i class="fas fa-phone" style="font-size: 24px;"></i> <!-- Font Awesome phone icon -->
                Contact Number:
                <?php echo $contact_number; ?>
            </p>
            <p>
                <i class="fas fa-map-marked" style="font-size: 24px;"></i> <!-- Font Awesome location icon -->
                Details Address:
                <?php echo $details_address; ?>
            </p>

            <p>
                <?php echo '<iframe width="400" height="300" style="border: 4px solid green"src="' . $map . '" style="position: relative; left: 50px; top: 20ox;" ... ></iframe>'; ?>
            </p>
        </div>
        <div class="inner">



       


            <div class="slider-container">
                <div class="slide">
                    <img src="image/4.jpg" alt="Image 1">
                </div>
                <div class="slide">
                    <img src="image/2.jpg" alt="Image 2">
                </div>
                <div class="slide">
                    <img src="image/3.jpg" alt="Image 3">
                </div>
            </div>
        </div>
    </div>
    <button onclick="window.location.href='http://localhost/project/userChatbox.php?restaurant_id=<?php echo $restaurant_id; ?>&user_id=<?php echo $user_id; ?>'" class="card-item1">
    <img src="image/message.png" alt="Chat Now">
</button>
</div>
<section class="show-products" style="padding-top: 0;">
     <h3>Our Menu For You</h3>
    <div class="box-container">
        <?php
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
            while ($fetch_products = $result->fetch_assoc()) :
        ?>
                <div class="box">
                    <img src="restaurant/<?= htmlspecialchars($fetch_products['image']); ?>" alt="">
                    <div class="flex">
                        <div class="price">
                            <span>Price BDT. </span><?= htmlspecialchars($fetch_products['price']); ?><span>/-</span>
                        </div>
                        <div class="category"><span></span><?= htmlspecialchars($fetch_products['category']); ?></div>
                    </div>
                    <div class="name"><?= htmlspecialchars($fetch_products['name']); ?></div>

                </div>
        <?php
            endwhile;
        } else {
            echo '<p class="empty">No products added yet!</p>';
        }

        // Close the prepared statement
        $stmt->close();
        ?>
    </div>
</section>




<button class="reservation">
    <a href="cart.php?restaurant_id=<?php echo $restaurant_id; ?>&user_id=<?php echo $user_id; ?>">Reserve Now</a>
</button>


</div>
    <?php
    // Execute the query to get nearby restaurants
    if (!empty($policeStation)) {
        $sql = "SELECT DISTINCT(r.restaurant_name), r.restaurant_id, r.email, r.r_image, r.cityCorporation, r.policeStaion, r.contactNumber1, r.contactNumber2, r.detailsAddress, r.map
                FROM restaurant as r 
                JOIN restaurant_features rf ON r.restaurant_id = rf.restaurant_id
                JOIN features f ON rf.feature_id = f.id
                WHERE r.policeStaion = '$policeStation'";

        // Execute the query
        $result = $conn->query($sql);

        // Check for errors
        if (!$result) {
            $error_message = "Error executing query: " . $conn->error;
        }

        // Display nearby restaurants
        echo '<div class="new-section">
                <h3>Restaurants For You </h3>
                <div class="card-list">';

        $count = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display restaurant information
                ?>
                <a href="http://localhost/project/restaurantDetails.php?restaurant_name=<?php echo $row['restaurant_name']; ?>&policeStation=<?php echo $row['policeStaion']; ?>&contact_number=<?php echo $row['contactNumber1']; ?>&details_address=<?php echo $row['detailsAddress']; ?> ?&map=<?php echo urlencode($row['map']); ?>" class="card-item">
              <img src="<?php echo $row['r_image']; ?>" alt="Card Image">
              <span class="rName">
                <?php echo $row['restaurant_name']; ?>
              </span>
              <span class="rArea">
                <?php echo "Area : " . $row['policeStaion']; ?>
              </span>
              <span class="rNum">
                <?php echo "Contact : " . $row['contactNumber1']; ?>
              </span>
              <span class="cDetails">
                <?php echo $row['detailsAddress']; ?>
              </span>
              <span class="cStatus">
                <?php echo "OPEN NOW"; ?>
              </span>
              <div class="arrow">
                <i class="fa-solid fa-up-right-and-down-left-from-center card-icon"></i>
              </div>
            </a>
                <?php
                $count += 1;
            }
            echo "<p>$count Restaurant found near by $policeStation</p>";
        } else {
            echo "<p>No Results Found</p>";
        }

        echo '</div>
        </div>';
    }

  //  $conn->close();
    ?>



</div>


<div class ="review">
<h1>Customers Review For <?php echo $restaurant_name; ?></h1>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['reviewText'];
    $user_id = $_POST['user_id'];
    $restaurant_id = $_POST['restaurant_id'];

    // Check if the review text is not empty
    if (!empty($text)) {
        // Prepare and execute the SQL statement to insert a review
        $insertStmt = $conn->prepare("INSERT INTO review (user_id, restaurant_id, review_text) VALUES (?, ?, ?)");

        if ($insertStmt) {
            $insertStmt->bind_param("iis", $user_id, $restaurant_id, $text);

            if ($insertStmt->execute()) {
                echo "Review submitted successfully";
                
                // Redirect to a different page after successful submission
                //header("Location: review.php");
                //exit(); // Ensure that no further code is executed after the redirect
            } else {
                echo "Error: " . $insertStmt->error;
            }

            $insertStmt->close();
        } else {
            echo "Error preparing the insert statement: " . $conn->error;
        }
    } else {
        echo "Review text is required.";
    }
}
$sql = "SELECT r.*, u.* FROM review r
        JOIN user u ON r.user_id = u.user_id
        WHERE r.restaurant_id = ?
        ORDER BY r.timestamp DESC
        LIMIT 20";
$selectStmt = $conn->prepare($sql);

if ($selectStmt) {
    $selectStmt->bind_param("i", $restaurant_id);
    $selectStmt->execute();

    $result = $selectStmt->get_result();

    if ($result->num_rows > 0) {
        // Display reviews
        while ($row = $result->fetch_assoc()) {
            echo '<p><img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
            echo "<p>Review Text: " . $row['review_text'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No reviews found for this restaurant.";
    }

    $selectStmt->close();
} else {
    echo "Error preparing the select statement: " . $conn->error;
}

// Close the database connection
$conn->close();
?>




    <!-- Form to send a new message -->
    <form method="post" action=" ">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="restaurant_id" value="<?= $restaurant_id ?>">
        <label for="reviewText">Enter your Review:</label>
        <textarea name="reviewText" id="reviewText" rows="8" cols="50" required></textarea>
        <br>
        <input type="submit" value="Submit Review">
    </form>
</div>




    <!-- Footer -->
    <div class="footer">
        <?php include('footer.php') ?>
    </div>

    <script src="scripts.js"></script>
</body>

</html>

