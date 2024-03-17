<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant sign up to BiteMap</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/restaurantsignup.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <link rel="stylesheet" href="">
</head>

<body>

    <div class="header">
        <video autoplay loop class="background-video" muted plays-inline>
            <source src="image/background.mp4" type="video/mp4">
        </video>
        <nav>
            <h1 class="logt">BITE<span>MAP</span></h1>
            <ul class="nav-links">
                <li><a href="http://localhost/project/welcomepage.php?#">HOME</a></li>
                <li><a href="#">OUR FEATURES</a></li>
                <li><a href="#">RESERVATION</a></li>
                <li><a href="#">OFFERS</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="localhost/project/signuphome.php">ABOUT US</a></li>
                <button type="submit"><a href="http://localhost/project/login.php">LOG IN</a></button>

        </nav>
        <div class="signup ">
            <form id="form" method="post" action="./fuctions/restaurantSignup.php" enctype="multipart/form-data"
                class="inner">
                <h6 class="logt">Restaurant Sign Up To BiteMap</h6>


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

                }
                ?>
                <div class="innerinner">
                    <div class="in">
                        <p>Restaurant Name : </p>
                        <input type="text" placeholder="Restaurant Name" name="restaurant_name"
                            value="<?php echo isset($_SESSION['input_values']['restaurant_name']) ? $_SESSION['input_values']['restaurant_name'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Email : </p>
                        <input type="text" placeholder="Email" name="email"
                            value="<?php echo isset($_SESSION['input_values']['email']) ? $_SESSION['input_values']['email'] : ''; ?>"
                            required>
                    </div>
                    <div class="in">
                        <p>Password</p>
                        <input type="password" placeholder="Password" name="password"
                            value="<?php echo isset($_SESSION['input_values']['password']) ? $_SESSION['input_values']['password'] : ''; ?>"
                            required>
                    </div>
                    <div class="in_img">
                        <label for="file-input">Select an image : </label>
                        <input type="file" name="restaurant_img"
                            
                            id="file-input" accept="image/*">
                    </div>
                </div>

                <div class="innerinner">
                    <div class="in">
                        <p>Select City Corporation : </p>
                        <select name="cityCorporation" id="cityCorporation">
                            <option value="#">SELECT YOUR OPTION</option>
                            <option value="Dhaka North" <?php echo (isset($_SESSION['input_values']['cityCorporation']) && $_SESSION['input_values']['cityCorporation'] == 'Dhaka North') ? 'selected' : ''; ?>>
                                Dhaka North</option>
                            <option value="Dhaka South" <?php echo (isset($_SESSION['input_values']['city_corporation']) && $_SESSION['input_values']['city_corporation'] == 'Dhaka South') ? 'selected' : ''; ?>>
                                Dhaka South</option>
                        </select>
                    </div>
                    <div class="in">
                        <p>Select Area : </p>
                        <input type="text" list="policeStation" placeholder="Enter Your Police Station"
                            name="policeStation"
                            value="<?php echo isset($_SESSION['input_values']['policeStation']) ? $_SESSION['input_values']['policeStation'] : ''; ?>" />
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
                    <div class="detailsAddress">
                        <p>Details Address : </p>
                        <input type="text" placeholder="Area Name, Block/Sector, Road Number,House  Number"
                            name="details_address"
                            value="<?php echo isset($_SESSION['input_values']['details_address']) ? $_SESSION['input_values']['details_address'] : ''; ?>"
                            required>
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
                                                <input type="checkbox" id="checkbox2" name="c1" value="Families">
                                                <label for="checkbox2">Families</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox2" name="c2" value="Couples">
                                                <label for="checkbox2">Couples</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox1" name="c3" value="Solo">
                                                <label for="checkbox3">Solo</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox1" name="c4" value="Friends">
                                                <label for="checkbox4">Friends</label>
                                            </div>

                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                        <h3>Type</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c5" value="Restaurants">
                                                <label for="checkbox3">Restaurants</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c6" value="Coffee & tea">
                                                <label for="checkbox3">Coffee & tea</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c7" value="Quick bites">
                                                <label for="checkbox3">Quick bites</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c8" value="Bakeries">
                                                <label for="checkbox3">Bakeries</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c9" value="Dessert">
                                                <label for="checkbox3">Dessert</label>

                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox3" name="c10" value="Delivery only">
                                                <label for="checkbox3">Delivery only</label>
                                            </div>
                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                        <h3>Meals</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c11" value="Breakfast">
                                                <label for="checkbox4">Breakfast</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c12" value="Lunch">
                                                <label for="checkbox4">Lunch</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c13" value="Dinner">
                                                <label for="checkbox4">Dinner</label>
                                            </div>

                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                        <h3>Price</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c14" value="Cheap Eats">
                                                <label for="checkbox4">Cheap Eats</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c15" value="Mid-range">
                                                <label for="checkbox4">Mid-range</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox4" name="c16" value="Fine Dining">
                                                <label for="checkbox4">Fine Dining</label>
                                            </div>

                                            <!-- Add more checkboxes as needed -->

                                        </div>

                                    </div>
                                    <div class="column2">
                                        <h3>Dishes</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c17" value="Beef">
                                                <label for="checkbox5">Beef</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c18" value="Burger">
                                                <label for="checkbox5">Burger</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c19" value="Cake">
                                                <label for="checkbox5">Cake</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c20" valu="Curry">
                                                <label for="checkbox5">Curry</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c21" value="Fish">
                                                <label for="checkbox5">Fish</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c22" value="Ice cream">
                                                <label for="checkbox5">Ice cream</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c23" value="Lamb">
                                                <label for="checkbox5">Lamb</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c24" value="Pancakes">
                                                <label for="checkbox6">Pancakes</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c25" value="Pasta">
                                                <label for="checkbox5">Pasta</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c26" value="Prawn">
                                                <label for="checkbox5">Prawn</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c27" value="Pesto">
                                                <label for="checkbox5">Pesto</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox5" name="c28" value="Sandwich">
                                                <label for="checkbox5">Sandwich</label>
                                            </div>

                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                        <h3>Good For</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox6" name="c29"
                                                    value="Family with children">
                                                <label for="checkbox6">Family with children</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox6" name="c30" value="Kids">
                                                <label for="checkbox6">Kids</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox6" name="c31"
                                                    value="Buisness meetings">
                                                <label for="checkbox6">Buisness meetings</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox7" name="c32" value="Large groups">
                                                <label for="checkbox7">Large groups</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox7" name="c33" value="Romantic">
                                                <label for="checkbox7">Romantic</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox7" name="c34" value="Local Cuisin">
                                                <label for="checkbox7">Local Cuisin</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox7" name="c35" value="Scenic view">
                                                <label for="checkbox7">Scenic view</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox7" name="c36" value="Hidden gems">
                                                <label for="checkbox7">Hidden gems</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox8" name="c37"
                                                    value="Hot new restaurants">
                                                <label for="checkbox8">Hot new restaurants</label>
                                            </div>
                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                    </div>
                                    <div class="column">
                                        <h3>Cuisines</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c38" value="Asian">
                                                <label for="checkbox9">Asian</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c39" value="Bangladeshi">
                                                <label for="checkbox9">Bangladeshi</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c40" value="Bar">
                                                <label for="checkbox9">Bar</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c41" value="Cafe">
                                                <label for="checkbox9">Cafe</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c42" value="Indian">
                                                <label for="checkbox9">Indian</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c43" value="Italian">
                                                <label for="checkbox9">Italian</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c44" value="Fast Food">
                                                <label for="checkbox9">Fast Food</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c45" value="Thai">
                                                <label for="checkbox9">Thai</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c46" value="Malaysian">
                                                <label for="checkbox9">Malaysian</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox9" name="c47" value="Pizza">
                                                <label for="checkbox9">Pizza</label>
                                            </div>


                                            <!-- Add more checkboxes as needed -->

                                        </div>

                                    </div>
                                    <div class="column4">
                                        <h3>Features</h3>
                                        <div class="checkbox-container">
                                            <!-- Checkbox items -->
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c48"
                                                    value="Accept Credit Cards">
                                                <label for="checkbox10">Accept Credit Cards</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c49" value="Buffet">
                                                <label for="checkbox10">Buffet</label>
                                            </div>

                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c50" value="Delivery">
                                                <label for="checkbox10">Delivery</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c51"
                                                    value="Digital Payments">
                                                <label for="checkbox10">Digital Payments</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c52" value="Free Wifi">
                                                <label for="checkbox10">Free Wifi</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c53" value="Family Style">
                                                <label for="checkbox10">Family Style</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c54"
                                                    value="Non Smoking Restaurant">
                                                <label for="checkbox10">Non Smoking Restaurant</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c55"
                                                    value="Outdoor Seating">
                                                <label for="checkbox10">Outdoor Seating</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c56"
                                                    value="Parking Available">
                                                <label for="checkbox10">Parking Available</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c57"
                                                    value="Private Dining">
                                                <label for="checkbox10">Private Dining</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c58" value="Reservations">
                                                <label for="checkbox10">Reservations</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c59" value="Seating">
                                                <label for="checkbox10">Seating</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c60"
                                                    value="Serves Alcohol">
                                                <label for="checkbox10">Serves Alcohol</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c61"
                                                    value="Smoking Allowed">
                                                <label for="checkbox10">Smoking Allowed</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c62" value="Takeout">
                                                <label for="checkbox10">Takeout</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="checkbox10" name="c63" value="Table service">
                                                <label for="checkbox10">Table service</label>
                                            </div>
                                            <!-- Add more checkboxes as needed -->

                                        </div>
                                        <!-- Add more checkboxes as needed -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="innerinner">
                    <div class="in">
                        <p>Contact Number 1 :</p>
                        <input type="text" placeholder="Contact Number 1" name="contact_number1"  value="<?php echo isset($_SESSION['input_values']['contact_number1']) ? $_SESSION['input_values']['contact_number1'] : ''; ?>" required>
                    </div>
                    <div class="in">
                        <p>Contact Number 2 : </p>
                        <input type="text" placeholder="Contact Number 2" name="contact_number2" value="<?php echo isset($_SESSION['input_values']['contact_number2']) ? $_SESSION['input_values']['contact_number2'] : ''; ?>">
                    </div>
                    <div class="log">
                        <button class="signup_button" name="signupbtn">Sign up</button>
                    </div>
                    <div class="login">
                        <p>Have an account?</p>
                        <button class="login_button"><a href="http://localhost/project/login.php">Log in</a></button>
                    </div>
                </div>

                <a href="login.php?key=1"></a>
            </form>

        </div>

    </div>
    <div>
        <h1>Hello</h1>
    </div>
    <?php include('footer.php') ?>

</html>