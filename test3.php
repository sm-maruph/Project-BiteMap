<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style_blog.css">
   <title>Create Post</title>
</head>
<body>
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
</body>
</html>
