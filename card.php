<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">

    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');
    

*{
    font-family: 'Poppins',sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-transform: capitalize;
    transition: all .2s linear;


}
.container{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px;
    min-height: 100vh;
    background: linear-gradient(90deg, #426750 50%,#2f4438 50%);
    padding-bottom: 70px;

}
.container form{
    padding: 20px;
    width: 700px;
    background: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,.1);
}
.container form .row{
    display: flex;
    flex-wrap: wrap;
    gap:15px;
}
.container form .row .col{
    flex:1 1 250px;
}


.container form .row .col .title{
    font-size: 20px;
    color: #333;
    padding-bottom: 5px;
    text-transform: uppercase;

}
.container form .row .col .inputBox{
    margin: 15px 0;

}

.container form .row .col .inputBox span{
    margin-bottom:10px;
    display: block;
}
.container form .row .col .inputBox input{
    width: 100%;
    border: 1px solid #ccc;
    padding: 10px 15px;
    font-size: 15px;
    text-transform: none;
}
.container form .row .col .inputBox input:focus{
    border: 1px solid #000;

}
.container form .row .col .flex{
    display: flex;
    gap: 15px;

}
.container form .row .col .flex .inputBox{
    margin-top: 5px;
}
.container form .row .col .flex .inputBox img{
    height: 34px;
    margin-top: 5px;
    filter: drop-shadow(0 0 1px #000);
}
.container form .submit-btn{
    width: 100%;
    padding: 12px;
    font-size: 17px;
    background: #778177;
    color: #fff;
    margin-top: 5px;
    cursor: pointer;
}
.container form .submit-btn:hover{
    background-color: rgb(8, 245, 95);
}
.error-message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    margin: 15px 0;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    text-align: center;
}

</style>
</head>
<body>
<?php include 'header.php'; ?>


<?php

// Retrieve values from URL parameters
$reservation_id = isset($_GET['reservation_id']) ? $_GET['reservation_id'] : null;
$grand_total = isset($_GET['grand_total']) ? $_GET['grand_total'] : null;
$restaurant_id = isset($_GET['restaurant_id']) ? $_GET['restaurant_id'] : null;



?>

<?php
// payment_process.php

// Include your database connection
include("templete/db_connect.php");

if (isset($_POST['submit_payment'])) {

    // Credentials are correct, redirect to another page
    header("Location: payment.php?reservation_id=" . $reservation_id . "&grand_total=" . $grand_total . "&restaurant_id=" . $restaurant_id);
    exit();
}

?>



<div class="container">

<form action="" method="POST">
        <div class="row">

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="image/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="Shakib Al Hasan">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2023">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <button type="submit" name="submit_payment" class="submit-btn">Proceed To Checkout</button>

    </form>

</div>    
    
</body>
</html>