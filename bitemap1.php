<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Search</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>

<body>
    <!-- Add your navigation bar code here -->

    <!-- Main Content -->
    <?php include('header.php') ?>
        <div class="content">
            <h1>Search Restaurant Here</h1>
            <form method="post" action="./fuctions/search.php">
                <div class="searchbar">
                <input type="text" placeholder="&#x270e; Enter Restaurant Name here"name="restaurantName">
                <div class="in">
                    <p>Select Area : </p>
                    <input type="text" list="policeStation" placeholder="OR Select Area" name="policeStation" />
                    <datalist id="policeStation" >
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
                    <button class="dropbtn">SELECT KEYWORDS
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
                                        <input type="checkbox" id="checkbox1" name="traveler_type[]"value="Families">
                                        <label for="checkbox1">Families</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="traveler_type[]"value="Couples">
                                        <label for="checkbox2">Couples</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="traveler_type[]"value="Solo">
                                        <label for="checkbox3">Solo</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="traveler_type[]"value="Friends">
                                        <label for="checkbox3">Friends</label>
                                    </div>
                                    <!-- Add more checkboxes as needed -->

                                </div>
                                <h3>Type</h3>
                                <div class="checkbox-container">
                                    <!-- Checkbox items -->
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox1" name="restaurant_type[]"value="Restaurants">
                                        <label for="checkbox1">Restaurants</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="restaurant_type[]"value="Coffee & tea">
                                        <label for="checkbox2">Coffee & tea</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="restaurant_type[]"value="Quick bites">
                                        <label for="checkbox3">Quick bites</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="restaurant_type[]"value="Bakeries">
                                        <label for="checkbox3">Bakeries</label>
                                    </div>                                    
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="restaurant_type[]" value="Dessert">
                                        <label for="checkbox3">Dessert</label>
                                    
                                        </div>                                    
                                        <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="restaurant_type[]"value="Delivery only">
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
                                        <input type="checkbox" id="checkbox1" name="price[]">
                                        <label for="checkbox1">Cheap Eats</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="price[]">
                                        <label for="checkbox2">Mid-range</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="price[]">
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
                                        <input type="checkbox" id="checkbox1" name="dishes[]">
                                        <label for="checkbox1">Beef</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="dishes[]">
                                        <label for="checkbox2">Burger</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Cake</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Curry</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Fish</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Ice cream</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Lamb</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Pancakes</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Pasta</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Prawn</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Pesto</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="dishes[]">
                                        <label for="checkbox3">Sandwich</label>
                                    </div>

                                    <!-- Add more checkboxes as needed -->

                                </div>
                                
                            </div>
                            <div class="column">
                            <h3>Good For</h3>
                                <div class="checkbox-container">
                                    <!-- Checkbox items -->
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox1" name="goodFor[]">
                                        <label for="checkbox1">Family with children</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="goodFor[]">
                                        <label for="checkbox2">Kids</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Buisness meetings</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Large groups</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Romantic</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Local cuisin</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Scenic view</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Hidden gems</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="goodFor[]">
                                        <label for="checkbox3">Hot new restaurants</label>
                                    </div>
                                    <!-- Add more checkboxes as needed -->

                                </div>
                            <h3>Cuisines</h3>
                                <div class="checkbox-container">
                                    <!-- Checkbox items -->
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox1" name="cuisin[]">
                                        <label for="checkbox1">Asian</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="cuisin[]">
                                        <label for="checkbox2">Bangladeshi</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Bar</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Cafe</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Indian</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Italian</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Fast Food</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Thai</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
                                        <label for="checkbox3">Malaysian</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="cuisin[]">
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
                                        <input type="checkbox" id="checkbox1" name="features[]">
                                        <label for="checkbox1">Accept Credit Cards</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox2" name="features[]">
                                        <label for="checkbox2">Buffet</label>
                                    </div>

                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Delivery</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Digital Payments</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Free Wifi</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Family Style</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Non Smoking restaurant</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Outdoor Seating</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Parking Available</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Private Dining</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Reservations</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Seating</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Serves Alcohol</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Smoking restaurant</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
                                        <label for="checkbox3">Takeout</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox3" name="features[]">
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

    <!-- New Section -->
    <div class="new-section">
        <h1>Hello</h1>
        <!-- Add your elements here -->
    </div>

    <!-- Footer -->
    <div class="footer">
    <?php include('footer.php') ?>
    </div>

    <!-- Include your JavaScript file link here -->
</body>

</html>