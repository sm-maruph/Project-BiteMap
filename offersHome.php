
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="css/userBlogHome.css">
   <title>Blog Home</title>
</head>

<body>

  <?php include('header.php') ?>





<?php
include("templete/db_connect.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
   $user_id = $_SESSION['user_id'];
   $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
   if(isset($_POST['submit_comment'])) {
      $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
   }
   // Check if the comment text is not empty
   if(!empty($comment_text)) {
      // Insert comment into the database
      $commentQuery = "INSERT INTO user_blog_comments (user_id, blog_id, comment_text) VALUES ('$user_id', '$blog_id', '$comment_text')";
      mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));
      header("Location: userBloghome.php");
      exit();
   }

   // Handle comment deletion
   if(isset($_POST['delete_comment'])) {
      $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

      // Perform delete operation
      $deleteCommentQuery = "DELETE FROM user_blog_comments WHERE comment_id = '$comment_id'";
      mysqli_query($conn, $deleteCommentQuery) or die('Comment deletion failed: '.mysqli_error($conn));


      // Redirect to the same page after deletion
      header("Location: userBloghome.php");
      exit();
   }


   // Handle post deletion
if (isset($_POST['delete_post'])) {
   $post_id = mysqli_real_escape_string($conn, $_POST['blog_id']);

   // Check if the user is the owner of the post
   $checkOwnershipQuery = "SELECT user_id FROM user_blogs WHERE blog_id = '$post_id' LIMIT 1";
   $ownershipResult = mysqli_query($conn, $checkOwnershipQuery) or die('Ownership check failed: ' . mysqli_error($conn));
   $ownershipRow = mysqli_fetch_assoc($ownershipResult);

   if ($ownershipRow['user_id'] == $_SESSION['user_id']) {
       // Manually delete likes for the post
       $deleteLikesQuery = "DELETE FROM user_blog_likes WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deleteLikesQuery) or die('Likes deletion failed: ' . mysqli_error($conn));

       // Manually delete comments for the post
       $deleteCommentsQuery = "DELETE FROM user_blog_comments WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deleteCommentsQuery) or die('Comments deletion failed: ' . mysqli_error($conn));

       // Perform delete operation for the post
       $deletePostQuery = "DELETE FROM user_blogs WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deletePostQuery) or die('Post deletion failed: ' . mysqli_error($conn));

       // Redirect to the same page after deletion
       header("Location: userBloghome.php");
       exit();
   }
}



   // Check if the user has already liked or disliked the post
   $userLiked = hasUserLikedOrDisliked($conn, $user_id, $blog_id, true);
   $userDisliked = hasUserLikedOrDisliked($conn, $user_id, $blog_id, false);

   if(isset($_POST['like'])) {
      if(!$userLiked && !$userDisliked) {
         // Handle Like
         mysqli_query($conn, "UPDATE user_blogs SET likes = likes + 1 WHERE blog_id = '$blog_id'");
         recordLikeOrDislike($conn, $user_id, $blog_id, true);
      } elseif($userLiked && !$userDisliked) {
         // Toggle like to unlike
         mysqli_query($conn, "UPDATE user_blogs SET likes = likes - 1 WHERE blog_id = '$blog_id'");
         removeLikeOrDislike($conn, $user_id, $blog_id, true);
      } elseif(!$userLiked && $userDisliked) {
         // Toggle dislike to like
         mysqli_query($conn, "UPDATE user_blogs SET likes = likes + 1, dislikes = dislikes - 1 WHERE blog_id = '$blog_id'");
         removeLikeOrDislike($conn, $user_id, $blog_id, false);
         recordLikeOrDislike($conn, $user_id, $blog_id, true);
      }
   } elseif(isset($_POST['dislike'])) {
      if(!$userLiked && !$userDisliked) {
         // Handle Dislike
         mysqli_query($conn, "UPDATE user_blogs SET dislikes = dislikes + 1 WHERE blog_id = '$blog_id'");
         recordLikeOrDislike($conn, $user_id, $blog_id, false);
      } elseif(!$userLiked && $userDisliked) {
         // Toggle dislike to like
         mysqli_query($conn, "UPDATE user_blogs SET dislikes = dislikes - 1 WHERE blog_id = '$blog_id'");
         removeLikeOrDislike($conn, $user_id, $blog_id, false);
      } elseif($userLiked && !$userDisliked) {
         // Toggle like to dislike
         mysqli_query($conn, "UPDATE user_blogs SET dislikes = dislikes + 1, likes = likes - 1 WHERE blog_id = '$blog_id'");
         removeLikeOrDislike($conn, $user_id, $blog_id, true);
         recordLikeOrDislike($conn, $user_id, $blog_id, false);
      }
   }
}

// Fetch and display blog posts
$query = "SELECT user_blogs.*, user.first_name, user.last_name
FROM user_blogs
INNER JOIN user ON user_blogs.user_id = user.user_id
ORDER BY user_blogs.timestamp DESC";

$result = mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));

//function for check like and dislike
function hasUserLikedOrDisliked($conn, $user_id, $blog_id, $liked) {
   $query = "SELECT * FROM user_blog_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id' AND liked = '$liked'";
   $result = mysqli_query($conn, $query);
   return mysqli_num_rows($result) > 0;
}

function recordLikeOrDislike($conn, $user_id, $blog_id, $liked) {
   // Check if the user has already liked or disliked the blog post
   if(!hasUserLikedOrDisliked($conn, $user_id, $blog_id, $liked)) {
      $query = "INSERT INTO user_blog_likes (user_id, blog_id, liked) VALUES ('$user_id', '$blog_id', '$liked')";
      mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));
   }
}

function removeLikeOrDislike($conn, $user_id, $blog_id, $liked) {
   $query = "DELETE FROM user_blog_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id' AND liked = '$liked'";
   mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));
}
?>










<div class="createPost">
      <h2>Create a New Post</h2>
      <form action="fuctions/process_post.php" method="post" enctype="multipart/form-data">
         <label for="title">Title:</label>
         <input type="text" name="title" required>

         <label for="content">Content:</label>
         <textarea name="content" required></textarea>

         <label for="image">Upload Image:</label>
         <input type="file" name="image">

         <input type="submit" value="Create Post">
      </form>
   </div>

   <div class="blogHome">
      <h2>BiteMap Customers Blog Home</h2>
      <?php

      while($row = mysqli_fetch_assoc($result)):
         echo '<div class="blog-post">';
         echo '<h3>'.$row['title'].'</h3>';
         echo '<p>'.$row['content'].'</p>';
         echo '<h4>Post by '.$row['first_name'].' '.$row['last_name'].' at '.$row['timestamp'].'</h4>';
         echo '<h4></h4>';

         if(!empty($row['image'])) {
            echo '<img src="'.$row['image'].'" alt="Blog Image" class>';
         }

         // Like and Dislike Buttons
         echo '<form action="userBlogHome.php" method="post">';
         echo '<input type="hidden" name="blog_id" value="'.$row['blog_id'].'">';
         echo '<button type="submit" name="like">Like '.$row['likes'].'</button>';
         echo '<button type="submit" name="dislike">Dislike '.$row['dislikes'].'</button>';
         echo '</form>';

         // Delete option for the blog post if the user is the owner
         if($row['user_id'] == $_SESSION['user_id']) {
            echo '<form method="post" action="userBlogHome.php">';
            echo '<input type="hidden" name="blog_id" value="'.$row['blog_id'].'">';
            echo '<button type="submit" name="delete_post">Delete Post</button>';
            echo '</form>';
         }


         //Delete options for comments
         echo '<div class="comments-section">';
         echo '<h4>Comments:</h4>';

         $blogId = $row['blog_id'];
         $commentQuery = "SELECT user_blog_comments.*, user.first_name,user.last_name
                   FROM user_blog_comments
                   INNER JOIN user ON user_blog_comments.user_id = user.user_id
                   WHERE blog_id = '$blogId'
                   ORDER BY user_blog_comments.timestamp DESC";

         $commentResult = mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));

         while($comment = mysqli_fetch_assoc($commentResult)):
            echo '<div class="comment">';
            echo '<p>'.$comment['comment_text'].'</p>';
            echo '<p>By <strong>'.$comment['first_name'].' '.$comment['last_name'].'</strong></p>';
            echo '<p>'.$comment['timestamp'].'</p>';


            // Add delete option for comments if the user is the owner
            if($comment['user_id'] == $_SESSION['user_id']) {
               echo '<form method="post" action="userBlogHome.php">';
               echo '<input type="hidden" name="comment_id" value="'.$comment['comment_id'].'">';
               echo '<button type="submit" name="delete_comment">Delete</button>';
               echo '</form>';
            }
            echo '</div>';
         endwhile;



         // Comment form
         echo '<form method="post" action="userBlogHome.php">';
         echo '<input type="hidden" name="blog_id" value="'.$row['blog_id'].'">';
         echo '<textarea name="comment_text" required></textarea>';
         echo '<input type="submit" name="submit_comment" value="Submit Comment">';
         echo '</form>';

         echo '</div>'; // Closing comments-section div
      
         // Display other blog details as needed
         echo '</div>'; // Closing blog-post div
      
      endwhile;

      ?>
</body>

</html>