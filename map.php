php
Copy code
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedded Google Map</title>
</head>
<body>

<?php
$map ="https://www.google.com/maps/embed?key=AIzaSyBY_c9f4hxpNIjI2CfkK9gP2ZL8jxXUrQg&pb=!1m18!1m12!1m3!1d3650.5040765827093!2d90.45227007459458!3d23.80066788684616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c97685d22cb9%3A0x5974a5fb4fb4d83f!2sChef&#39;s%20Table%20Courtside%20~%20United%20City!5e0!3m2!1sen!2sbd!4v1701795056118!5m2!1sen!2sbd" 
;


// Assuming $mapUrl contains the embedded map URL
$mapUrl = $map ; // Replace with your actual map URL

// Output the embedded map using PHP
echo '<iframe width="300" height="300" frameborder="0" style="border:0" allowfullscreen src="' . $mapUrl . '"></iframe>';
?>



<?php
$map ="https://www.google.com/maps/embed?key=AIzaSyBY_c9f4hxpNIjI2CfkK9gP2ZL8jxXUrQg&pb=!1m14!1m8!1m3!1d17705.9878570862!2d90.36963962899183!3d23.74929730774222!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bfe0029535b9%3A0x939c83ab249848e8!2sPure%20Restaura%20and%20kabab%20Ghor!5e0!3m2!1sen!2sbd!4v1701791594243!5m2!1sen!2sbd" 
;

// Assuming $mapUrl contains the embedded map URL
$mapUrl = $map ; // Replace with your actual map URL

// Output the embedded map using PHP
echo '<iframe width="300" height="300" frameborder="0" style="border:0" allowfullscreen src="' . $mapUrl . '"></iframe>';
?>

</body>
</html>