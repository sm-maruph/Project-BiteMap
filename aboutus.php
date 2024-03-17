<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="CSS/footer.css">

   <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: aliceblue;
}

.heading {
    text-align: center;
    margin: 30px 0;
}
.heading h3{
    font-size: 30px;
    color: white;
}

.about {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    text-align: justify;
    padding: 20px;
}

.about .column {
    flex: 0 0 30%; /* Adjust the width as needed */
    margin-bottom: 20px;
}

.about img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.content {
    max-width: 100%;
    margin-left: 0;
}

.btn {
    display: inline-block;
    padding: 10px 25px;
    text-decoration: none;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #2980b9;
}

.steps {
    text-align: center;
    padding: 40px 0;
}

.steps .box-container {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}

.steps .box-container .box {
    flex: 0 0 30%; /* Adjust the width as needed */
    text-align: center;
    border: var(--border);
    padding: 2rem;
    margin-bottom: 20px;
    border: 2px solid black;
}

.steps .box-container .box img {
    height: 8rem;
    width: 100%;
    object-fit: contain;
    margin-bottom: 1rem;
    
}

.steps .box-container .box h3 {
    font-size: 2rem;
    margin: 1rem 0;
    color: var(--black);
    text-transform: capitalize;
}

.steps .box-container .box p {
    line-height: 2;
    font-size: 1rem;
    color: var(--light-color);
}


section {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .column {
            flex: 0 0 30%;
            padding: 0 15px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
            line-height: 1.6;
        }

        .feature {
            margin-bottom: 20px;
        }

     
/* Style for the footer */
.footer {
    color: #fff;
    padding: 20px 0;
}
.tittle h1{
    
    font-size: 30px;
    color: black;
}

.grid {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    flex-wrap: wrap;
}

.box {
    flex: 0 0 30%;
    text-align: center;
    padding: 20px;
    margin: 10px;
    border: 1px solid #555;
    border-radius: 8px;
    transition: background-color 0.3s;
}
.box h3{
    color: black;
}

.box:hover {
    background-color: #555;
}

.box img {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}

.box h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.box a {
    color: black;
    text-decoration: none;
}

.box a:hover {
    text-decoration: none;
    color: white;
}
        

   </style>
</head>
<body>
<?php
session_start();
$log = 0;
$fetch = []; 

// Include the database connection file
include("templete/db_connect.php");

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $log = 1;

    // Check if the database connection is open
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
}


?>
<div class="header">
<video autoplay loop class="background-video" muted plays-inline>
            <source src="image/background.mp4" type="video/mp4">
        </video>
        <nav>
        <h1 class="logt">BITE<span>MAP</span></h1>
            <ul class="nav-links">
                <li><a href="http://localhost/project/bitemap.php">HOME</a></li>
                <li><a href="#">OUR FEATURES</a></li>
                <li><a href="offerHOme.php">OFFERS</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                
            

                    <?php if($log): ?>
               
                <li><a href="http://localhost/project/userBloghome.php">BLOG</a></li>
                <li><a href="http://localhost/project/messageHome.php">INBOX</a></li>
        
                <button type="submit" class ="navbutton"><a href="fuctions/logout.php">LOG OUT</a></button>
                  <li class="dropdown1">
                <?php 
                    echo '<img src="'.$fetch['profile_picture'].'" alt="Profile Picture" class="round-image">';
                  ?>
                   <div class="dropdown1-content1">
                    <a href="http://localhost/project/userProfile.php">User Profile</a>
                    <a href="http://localhost/project/updateProfile.php">Update Profile</a>
                    <a href="fuctions/logout.php">LOG OUT</a>
                </div>
              </li>
               <li><a href="cart.php"><img src="image/cart1.png" alt="Shopping Cart"></a></li>

             </ul>
            
          
            <?php else: ?>
                <div class="dropdown2">
    <button type="submit" class="navbutton">LOG IN</button>
    <div class="dropdown2-content2">
        <a href="http://localhost/project/restaurant/login.php">Restaurant</a>
        <a href="http://localhost/project/login.php">Customers</a>
        <a href="#">Admin</a>
    </div>
</div>
                <button type="submit"class ="navbutton"><a href="http://localhost/project/signuphome.php">SIGN UP</a></button>            

            <?php endif; ?>

        </ul>
    </nav>    




   <div class="heading">
      <h3>About Us</h3>
   </div>

   <section>
        <div class="column">
            <div class="feature">
                <h2>User Features</h2>
                <p>Easily search for restaurants based on cuisine, location, or name.</p>
            </div>

            <div class="feature">
                <h2>Advanced Filters</h2>
                <p>Use filters to narrow down your search results, such as price range or ratings.</p>
            </div>

            <div class="feature">
                <h2>User Reviews</h2>
                <p>Read reviews from other users to make informed decisions about where to dine.</p>
            </div>
        </div>

        <div class="column">
            <div class="feature">
                <h2>Restaurant Features</h2>
                <p>View restaurant locations on an interactive map for a better understanding of their proximity.</p>
            </div>

            <div class="feature">
                <h2>User Accounts</h2>
                <p>Create an account to save your favorite restaurants and contribute your own reviews.</p>
            </div>

            <div class="feature">
                <h2>Responsive Design</h2>
                <p>Access the website seamlessly on any device – desktop, tablet, or mobile.</p>
            </div>
        </div>

        <div class="column">
            <div class="feature">
                <h2>Special Features</h2>
                <p>Exclusive offers and promotions for registered users.</p>
            </div>

            <div class="feature">
                <h2>Customized Recommendations</h2>
                <p>Receive personalized restaurant recommendations based on your preferences.</p>
            </div>

            <div class="feature">
                <h2>Real-time Updates</h2>
                <p>Get real-time information about restaurant availability and waiting times.</p>
            </div>
        </div>
    </section>
    </div>
<div class="title">
<h1 >Simple Steps</h1>

</div>
   <section class="steps">
      <div class="box-container">
         <div class="box">
            <img src="image/14.png" alt="">
            <h3>Search</h3>
            <p>Find out your nearest & desired restaurant</p>
         </div>
         <div class="box">
            <img src="image/11.png" alt="">
            <h3>Reservation</h3>
            <p>Reserve a seat at your desired place</p>
         </div>
         <div class="box">
            <img src="image/step-3.png" alt="">
            <h3>Enjoy Food</h3>
            <p>Enjoy food, enjoy life!</p>
         </div>
         <div class="box">
            <img src="image/12.jpg" alt="">
            <h3>Explore</h3>
            <p>Explore our best deals and offers</p>
         </div>
         <div class="box">
            <img src="image/17.png" alt="">
            <h3>Share</h3>
            <p>Share your experiences honestly!</p>
         </div>
      </div>
   </section>

   <footer class="footer">

   <section class="grid">
      
      <div class="box">
         <img src="image/phone-icon.png" alt="">
         <h3>our number</h3>
         <a href="tel:01766972626">01766972626</a>
      </div>

      <div class="box">
         <img src="image/email-icon.png" alt="">
         <h3>our email</h3>
         <a href="mailto:bitemap201@gmail.com">bitemap201@gmail.com</a>
      </div>

      

      <div class="box">
         <img src="image/map-icon.png" alt="">
         <h3>our address</h3>
         <a href="https://www.google.com.bd/maps/search/uiu/@23.7898675,90.4280512,15z/data=!3m1!4b1?entry=ttu">United International University</a>
      </div>

      

   </section>


</footer>
<div class="footer">
      <?php include('footer.php') ?>
    </div>

</body>
</html>
