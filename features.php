<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR FEATURES</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
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

        h1{
            color: #e22424;
        }
        h2 {
            color: orangered;
        }
        
        p {
            color: #666;
            line-height: 1.6;
        }

        .feature {
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<?php include('header.php');?>

    <header>
        <h1>Our Features</h1>
    </header>

    <section>
        <div class="column">
            <h1>FOR USER</h1>
            <div class="feature">
                <h2>Search</h2>
                <p>View restaurant locations on an interactive map for a better understanding of their proximity  based on name or location.</p>
            </div>

            <div class="feature">
                <h2>Advanced Filters</h2>
                <p>Use filters to narrow down your search results, such as price range,types or areas.</p>
            </div>

            <div class="feature">
                <h2>User Accounts</h2>
                <p>Create an account to search your desire restaurants and contribute your own reviews.</p>
            </div>

            <div class="feature">
                <h2>Reservation</h2>
                <p>Reserve your sit with preorder menu.</p>
            </div>

            <div class="feature">
                <h2>Offers</h2>
                <p>An offer can refer to a promotion, discount, or special deal presented to customers to encourage them to make a purchase.</p>
            </div>

            <div class="feature">
                <h2>ChatBox</h2>
                <p>Static chatbox for a direct and better communication with a particular restaurent.</p>
            </div>

            <div class="feature">
                <h2>Blogs</h2>
                <p>User can share his/her experiences by uploading images or posts.</p>
            </div>

            <div class="feature">
                <h2>User Reviews</h2>
                <p>Read/Write reviews  to make informed decisions about where to dine.</p>
            </div>

            <div class="feature">
                <h2>Payment</h2>
                <p>User can do payments for reservation with BiteMap balance.</p>
            </div>

        </div>

        <div class="column">
        <h1>FOR RESTAURENT</h1>

           
            <div class="feature">
                <h2>Restaurant Accounts</h2>
                <p>Create an account to enhance your business field virtually with thousands of customers.</p>
            </div>

            <div class="feature">
                <h2>Multidimensional Dashboard</h2>
                <p>...</p>
            </div>

            <div class="feature">
                <h2>Control Reservation</h2>
                <p>An admin can control reservation with 3status: pending,confirm and complete. </p>
            </div>

            <div class="feature">
                <h2>Collect Payment</h2>
                <p>An admin can control all collection. </p>
            </div>

            <div class="feature">
                <h2>ChatBox</h2>
                <p>Static chatbox for connect with customers.</p>
            </div>

            <div class="feature">
                <h2>Offers</h2>
                <p>A restaurant can create an offer for a best deal via discount for customer satisfaction,retention and actually for thier marketing.</p>
            </div>


        </div>

        <div class="column">
        <h1>SPECIAL FEATURES</h1>

        <div class="feature">
                <h2>Responsive Design</h2>
                <p>Access the website seamlessly on any device – desktop, tablet, or mobile.</p>
            </div>

            <div class="feature">
                <h2>Security</h2>
                <p>All the passcode are encrypted with hash(#).</p>
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
</body>
</html>