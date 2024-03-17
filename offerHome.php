
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="css/userBlogHome.css">
   <title>Offer Home</title>
</head>

<body>

  <?php include('header.php') ?>





<?php
include("templete/db_connect.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
   $user_id = $_SESSION['user_id'];
   $offer_id = mysqli_real_escape_string($conn, $_POST['offer_id']);
   if(isset($_POST['submit_comment'])) {
      $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
   }
   // Check if the comment text is not empty
   if(!empty($comment_text)) {
      // Insert comment into the database
      $commentQuery = "INSERT INTO offer_post_comments (user_id, offer_id, comment_text) VALUES ('$user_id', '$offer_id', '$comment_text')";
      mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));
      header("Location: offerHome.php");
      exit();
   }

   // Handle comment deletion
   if(isset($_POST['delete_comment'])) {
      $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

      // Perform delete operation
      $deleteCommentQuery = "DELETE FROM offer_post_comments WHERE comment_id = '$comment_id'";
      mysqli_query($conn, $deleteCommentQuery) or die('Comment deletion failed: '.mysqli_error($conn));


      // Redirect to the same page after deletion
      header("Location: offerHome.php");
      exit();
   }


   // Check if the user has already liked or disliked the post
   $userLiked = hasUserLikedOrDisliked($conn, $user_id, $offer_id, true);
   $userDisliked = hasUserLikedOrDisliked($conn, $user_id, $offer_id, false);
   if(isset($_POST['like'])) {
      if(!$userLiked && !$userDisliked) {
         // Handle Like
         mysqli_query($conn, "UPDATE offer_post SET likes = likes + 1 WHERE offer_id = '$offer_id'");
         recordLikeOrDislike($conn, $user_id, $offer_id, true);
      } elseif($userLiked && !$userDisliked) {
         // Toggle like to unlike
         mysqli_query($conn, "UPDATE offer_post SET likes = likes - 1 WHERE offer_id = '$offer_id'");
         removeLikeOrDislike($conn, $user_id, $offer_id, true);
      } elseif(!$userLiked && $userDisliked) {
         // Toggle dislike to like
         mysqli_query($conn, "UPDATE offer_post SET likes = likes + 1, dislikes = dislikes - 1 WHERE offer_id = '$offer_id'");
         removeLikeOrDislike($conn, $user_id, $offer_id, false);
         recordLikeOrDislike($conn, $user_id, $offer_id, true);
      }
   } elseif(isset($_POST['dislike'])) {
      if(!$userLiked && !$userDisliked) {
         // Handle Dislike
         mysqli_query($conn, "UPDATE offer_post SET dislikes = dislikes + 1 WHERE offer_id = '$offer_id'");
         recordLikeOrDislike($conn, $user_id, $offer_id, false);
      } elseif(!$userLiked && $userDisliked) {
         // Toggle dislike to like
         mysqli_query($conn, "UPDATE offer_post SET dislikes = dislikes - 1 WHERE offer_id = '$offer_id'");
         removeLikeOrDislike($conn, $user_id, $offer_id, false);
      } elseif($userLiked && !$userDisliked) {
         // Toggle like to dislike
         mysqli_query($conn, "UPDATE offer_post SET dislikes = dislikes + 1, likes = likes - 1 WHERE offer_id = '$offer_id'");
         removeLikeOrDislike($conn, $user_id, $offer_id, true);
         recordLikeOrDislike($conn, $user_id, $offer_id, false);
      }
   }
}

// Fetch and display offer posts
$query = "SELECT offer_post.*, restaurant.*
FROM offer_post
INNER JOIN restaurant ON offer_post.restaurant_id = restaurant.restaurant_id
ORDER BY offer_post.timestamp DESC";

$result = mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));

//function for check like and dislike
function hasUserLikedOrDisliked($conn, $user_id, $offer_id, $liked) {
   $query = "SELECT * FROM offer_post_likes WHERE user_id = '$user_id' AND offer_id = '$offer_id' AND liked = '$liked'";
   $result = mysqli_query($conn, $query);
   return mysqli_num_rows($result) > 0;
}

function recordLikeOrDislike($conn, $user_id, $offer_id, $liked) {
   // Check if the user has already liked or disliked the blog post
   if(!hasUserLikedOrDisliked($conn, $user_id, $offer_id, $liked)) {
      $query = "INSERT INTO offer_post_likes (user_id, offer_id, liked) VALUES ('$user_id', '$offer_id', '$liked')";
      mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));
   }
}

function removeLikeOrDislike($conn, $user_id, $offer_id, $liked) {
   $query = "DELETE FROM offer_post_likes WHERE user_id = '$user_id' AND offer_id = '$offer_id' AND liked = '$liked'";
   mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));
}
?>










   <div class="blogHome">
      <h2>BiteMap Restaurant Offer Home</h2>
      <?php

      while($row = mysqli_fetch_assoc($result)):
         echo '<div class="blog-post">';
         echo '<h5><img src="' . $row['r_image'] . '" alt="Profile Picture" class="round-image"> ' . $row['restaurant_name']. '</h5>';
         echo '<h4>Post at '.$row['timestamp'].'</h4>';

         echo '<h3>'.$row['tittle'].'</h3>';
         echo '<p>'.$row['content'].'</p>';
         echo '<h4></h4>';

         if(!empty($row['image'])) {
            echo '<img src="'.$row['image'].'" alt="Blog Image" class>';
         }

         // Like and Dislike Buttons
         echo '<form action="offerHome.php" method="post">';
         echo '<input type="hidden" name="offer_id" value="'.$row['offer_id'].'">';
         echo '<button type="submit" name="like">Like '.$row['likes'].'</button>';
         echo '<button type="submit" name="dislike">Dislike '.$row['dislike'].'</button>';
         echo '</form>';


         //Delete options for comments
         echo '<div class="comments-section">';
         echo '<h4>Comments:</h4>';

         $OfferId = $row['offer_id'];
         $commentQuery = "SELECT offer_post_comments.*, user.first_name,user.last_name,user.profile_picture
                   FROM offer_post_comments
                   INNER JOIN user ON offer_post_comments.user_id = user.user_id
                   WHERE offer_id = '$OfferId'
                   ORDER BY offer_post_comments.timestamp DESC";

         $commentResult = mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));

         while($comment = mysqli_fetch_assoc($commentResult)):
            echo '<div class="comment">';
            echo '<p><img src="' . $comment['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' .' <strong>'.$comment['first_name'].' '.$comment['last_name'].'</strong>. </p>';

            //echo '<p>By <strong>'.$comment['first_name'].' '.$comment['last_name'].'</strong></p>';

            echo '<p>'.$comment['comment_text'].'</p>';
            echo '<p>'.$comment['timestamp'].'</p>';


            // Add delete option for comments if the user is the owner
            if($comment['user_id'] == $_SESSION['user_id']) {
               echo '<form method="post" action="offerHome.php">';
               echo '<input type="hidden" name="comment_id" value="'.$comment['comment_id'].'">';
               echo '<button type="submit" name="delete_comment">Delete Comment</button>';
               echo '</form>';
            }
            echo '</div>';
         endwhile;



         // Comment form
         echo '<form method="post" action="offerHome.php">';
         echo '<input type="hidden" name="offer_id" value="'.$row['offer_id'].'">';
         echo '<textarea name="comment_text" required></textarea>';
         echo '<button type="submit" name="submit_comment" value="Submit Comment">Submit Comment</button>';
         echo '</form>';

         echo '</div>'; // Closing comments-section div
      
         // Display other blog details as needed
         echo '</div>'; // Closing blog-post div
      
      endwhile;

      ?>
</body>

</html>