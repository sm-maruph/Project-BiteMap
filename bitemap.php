<?php
include("templete/db_connect.php");
include("fuctions/search.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome To BiteMap</title>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="CSS/home.css">
  <link rel="stylesheet" href="CSS/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha384-GLhlTQ8iNl7Nl6rZ+YXPEy5KcazUVj5r5+PBbz5PiFE2kxFv1y2ZZK1d2omlOIlC" crossorigin="anonymous">


</head>

<body>

  <?php include('header.php') ?>
  <div class="content">
  <?php
    if (!empty($_SESSION['user_id'])) {
        echo "<h3>Hello " . $fetch['first_name'] . " " . $fetch['last_name'] . " </h3>";
    }
?>

  <h1>Search Restaurant Here</h1>
    <form method="post" action="bitemap.php">
      <div class="searchbar">
        <input type="text" placeholder="&#x270e; Enter Restaurant Name here" name="restaurantName">
        <div class="in">
          <p>Select Area : </p>
          <input type="text" list="policeStation" placeholder="OR Select Area" name="policeStation" />
          <datalist id="policeStation">
            <option value="Khilkhet">Khilkhet</option>
            <option value="Kafrul ">Kafrul </option>
            <option value="Dhanmondi">Dhanmondi</option>
            <option value="Mohammadpur">Mohammadpur</option>
            <option value="Sutrapur">Sutrapur</option>
            <option value="Jatrabari">Jatrabari</option>
            <option value="Airport">Airport</option>
            <option value="Gulshan">Gulshan</option>
            <option value="Uttara West">Uttara West</option>
            <option value="Mugda">Mugda</option>
            <option value="Rupnagar">Rupnagar</option>
            <option value="Vashantek">Vashantek</option>
            <option value="Bhatara">Bhatara</option>
            <option value="Banani">Banani</option>
            <option value="Wari">Wari</option>
            <option value="Shahjahanpur">Shahjahanpur</option>
            <option value="Sher-e-Bangla Nagar">Sher-e-Bangla Nagar</option>
            <option value="Mirpur">Mirpur</option>
            <option value="Darussalam">Darussalam</option>
            <option value="Dakshin Khan">Dakshin Khan </option>
            <option value="Uttarkhan">Uttarkhan</option>
            <option value="Cantonment">Cantonment</option>
            <option value="Badda">Badda</option>
            <option value="Pallabi">Pallabi</option>
            <option value="Tejgaon Industrial Area">Tejgaon Industrial Area</option>
            <option value="Rampura">Rampura</option>
            <option value="Kalabagan">Kalabagan</option>
            <option value="Shahbag">Shahbag</option>
            <option value="Motijheel">Motijheel</option>
            <option value="Khilgaon">Khilgaon</option>
            <option value="Ramna">Ramna</option>
            <option value="Paltan">Paltan</option>
            <option value="Newmarket">Newmarket</option>
            <option value="Adabar">Adabar</option>
            <option value="Uttarkhan">Uttarkhan</option>
            <option value="Hatirjheel">Hatirjheel</option>
          </datalist>
        </div>
        <button type="submit">Search</button>
      </div>

      <div class="catagorylist">
        <div class="dropdown">
          <button class="dropbtn" type="button">SELECT KEYWORDS
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <div class="headerinner">
              <h2>Select keywords to specified your search</h2>
            </div>
            <div class="row">
              <div class="column">
                <h3>Traveler type</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="traveler_type[]" value="Families">
                    <label for="checkbox1">Families</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="traveler_type[]" value="Couples">
                    <label for="checkbox2">Couples</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="traveler_type[]" value="Solo">
                    <label for="checkbox3">Solo</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="traveler_type[]" value="Friends">
                    <label for="checkbox3">Friends</label>
                  </div>
                  <!-- Add more checkboxes as needed -->

                </div>
                <h3>Type</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="restaurant_type[]" value="Restaurants">
                    <label for="checkbox1">Restaurants</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="restaurant_type[]" value="Coffee & tea">
                    <label for="checkbox2">Coffee & tea</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="restaurant_type[]" value="Quick bites">
                    <label for="checkbox3">Quick bites</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="restaurant_type[]" value="Bakeries">
                    <label for="checkbox3">Bakeries</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="restaurant_type[]" value="Dessert">
                    <label for="checkbox3">Dessert</label>

                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="restaurant_type[]" value="Delivery only">
                    <label for="checkbox3">Delivery only</label>
                  </div>
                  <!-- Add more checkboxes as needed -->

                </div>
                <h3>Meals</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="meal_type[]" value="Breakfast">
                    <label for="checkbox1">Breakfast</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="meal_type[]" value="Lunch">
                    <label for="checkbox2">Lunch</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="meal_type[]" value="Dinner">
                    <label for="checkbox3">Dinner</label>
                  </div>

                  <!-- Add more checkboxes as needed -->

                </div>
                <h3>Price</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="price[]" value="Cheap Eats">
                    <label for="checkbox1">Cheap Eats</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="price[]" value="Mid-range">
                    <label for="checkbox2">Mid-range</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="price[]" value="Fine Dining">
                    <label for="checkbox3">Fine Dining</label>
                  </div>

                  <!-- Add more checkboxes as needed -->

                </div>

              </div>
              <div class="column2">
                <h3>Dishes</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="dishes[]" value="Beef">
                    <label for="checkbox1">Beef</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="dishes[]" value="Burger">
                    <label for="checkbox2">Burger</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Cake">
                    <label for="checkbox3">Cake</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Curry">
                    <label for="checkbox3">Curry</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Fish">
                    <label for="checkbox3">Fish</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Ice cream">
                    <label for="checkbox3">Ice cream</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Lamb">
                    <label for="checkbox3">Lamb</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Pancakes">
                    <label for="checkbox3">Pancakes</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Pasta">
                    <label for="checkbox3">Pasta</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Prawn">
                    <label for="checkbox3">Prawn</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Pesto">
                    <label for="checkbox3">Pesto</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="dishes[]" value="Sandwich">
                    <label for="checkbox3">Sandwich</label>
                  </div>

                  <!-- Add more checkboxes as needed -->

                </div>
                <button type="submit" class="button2">FILTER NOW</button>
              </div>
              <div class="column">
                <h3>Good For</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="goodFor[]" value="Family with children">
                    <label for="checkbox1">Family with children</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="goodFor[]" value="Kids">
                    <label for="checkbox2">Kids</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Buisness meetings">
                    <label for="checkbox3">Buisness meetings</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Large groups">
                    <label for="checkbox3">Large groups</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Romantic">
                    <label for="checkbox3">Romantic</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Local cuisin">
                    <label for="checkbox3">Local cuisin</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Scenic view">
                    <label for="checkbox3">Scenic view</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Hidden gems">
                    <label for="checkbox3">Hidden gems</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="goodFor[]" value="Hot new restaurants">
                    <label for="checkbox3">Hot new restaurants</label>
                  </div>
                  <!-- Add more checkboxes as needed -->

                </div>
                <h3>Cuisines</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="cuisin[]" value="Asian">
                    <label for="checkbox1">Asian</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="cuisin[]" value="Bangladeshi">
                    <label for="checkbox2">Bangladeshi</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Bar">
                    <label for="checkbox3">Bar</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Cafe">
                    <label for="checkbox3">Cafe</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Indian">
                    <label for="checkbox3">Indian</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Italian">
                    <label for="checkbox3">Italian</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Fast Food">
                    <label for="checkbox3">Fast Food</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Thai">
                    <label for="checkbox3">Thai</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Malaysian">
                    <label for="checkbox3">Malaysian</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="cuisin[]" value="Pizza">
                    <label for="checkbox3">Pizza</label>
                  </div>


                  <!-- Add more checkboxes as needed -->

                </div>

              </div>
              <div class="column4">
                <h3>Features</h3>
                <div class="checkbox-container">
                  <!-- Checkbox items -->
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox1" name="features[]" value="Accept Credit Cards">
                    <label for="checkbox1">Accept Credit Cards</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox2" name="features[]" value="Buffet">
                    <label for="checkbox2">Buffet</label>
                  </div>

                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Delivery">
                    <label for="checkbox3">Delivery</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Cheap Eats">
                    <label for="Digital Payments">Digital Payments</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Free Wifi">
                    <label for="checkbox3">Free Wifi</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Family Style">
                    <label for="checkbox3">Family Style</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Non Smoking restaurant">
                    <label for="checkbox3">Non Smoking restaurant</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Outdoor Seating">
                    <label for="checkbox3">Outdoor Seating</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Parking Available">
                    <label for="checkbox3">Parking Available</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Private Dining">
                    <label for="checkbox3">Private Dining</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Reservations">
                    <label for="checkbox3">Reservations</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Seating">
                    <label for="checkbox3">Seating</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Serves Alcohol">
                    <label for="checkbox3">Serves Alcohol</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Smoking restaurant">
                    <label for="checkbox3">Smoking restaurant</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Takeout">
                    <label for="checkbox3">Takeout</label>
                  </div>
                  <div class="checkbox-item">
                    <input type="checkbox" id="checkbox3" name="features[]" value="Table service">
                    <label for="checkbox3">Table service</label>
                  </div>
                  <!-- Add more checkboxes as needed -->

                </div>
                <!-- Add more checkboxes as needed -->
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  </div>
  <div class="map">

  </div>
  <!-- New Section -->
  <div class="new-section">
    <h3>Restaurants For You </h3>
    <div class="card-list">
      <?php
      // Assume $result is the result set containing books from the database
      $count = 0;
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $count = 0;
         // Check for errors
    if (!$result) {
      $error_message = "Error executing query: " . $conn->error;
  } else {
      // Assuming you want to store data in session only if there are results
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // Store values in session
              $_SESSION['restaurant_name'] = $row['restaurant_name'];
              $_SESSION['restaurant_id'] = $row['restaurant_id'];
              $_SESSION['policeStation'] = $row['policeStaion'];
              $_SESSION['contact_number'] = $row['contactNumber1'];
              $_SESSION['details_address'] = $row['detailsAddress'];
              $_SESSION['r_image'] = $row['r_image'];
              $_SESSION['map'] = $row['map'];
              //echo  $_SESSION['restaurant_id'];
           // $_SESSION['map'] = $row['map'];
           //echo '<p>';
           //echo '<iframe src="' . htmlspecialchars($row['map']) . '" ... ></iframe>';
           //echo '</p>';            
            
            //$_SESSION['map'] = $row['map'];
            ?>
            <a href="http://localhost/project/restaurantDetails.php?restaurant_name=<?php echo $row['restaurant_name']; ?>&restaurant_id=<?php echo $row['restaurant_id']; ?>&policeStation=<?php echo $row['policeStaion']; ?>&contact_number=<?php echo $row['contactNumber1']; ?>&details_address=<?php echo $row['detailsAddress']; ?> ?&map=<?php echo urlencode($row['map']); ?>" class="card-item">
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
          echo "<p>Total Restaurant Found by your filter = $count </p> " ;
        } else {
          echo "<p>No Results Found</p>";
        }
      }
    }
      ?>

    </div>

</div>
    <!-- Footer -->
    <div class="footer">
      <?php include('footer.php') ?>
    </div>

    <!-- Include your JavaScript file link here -->
    <script src="script.js"></script>


</html>