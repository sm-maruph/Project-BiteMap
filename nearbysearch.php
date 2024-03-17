<?php
//include("../templete/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    

    // Build the SQL query
    $sql = "SELECT DISTINCT(r.restaurant_name), r.restaurant_id, r.email,r.r_image, r.cityCorporation, r.policeStaion, r.contactNumber1, r.contactNumber2, r.detailsAddress ,r.map
            FROM restaurant as r 
            JOIN restaurant_features rf ON r.restaurant_id = rf.restaurant_id
            JOIN features f ON rf.feature_id = f.id
            WHERE policestaion ='vatara";


 // Execute the query
 $result = $conn->query($sql);

 // Check for errors
 if (!$result) {
   $error_message = "Error executing query: " . $conn->error;
 }
}
$conn->close();
?>