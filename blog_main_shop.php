<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Offers</title>
    <link rel="stylesheet" href="CSS/style_blog.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">


</head>

<body>
    <?php include("header.php") ?>
    <div class="nav inner">
        <h3>Nav Menu</h3>
    </div>
    <div class="blog_section">
        <table>
            <?php
            session_start();
            include("templete/db_connect.php");

            // Fetch data from the database
            $sql = "SELECT * FROM shop_post ORDER BY post_id DESC";
            $result = $conn->query($sql);

            if (!$result) {
                die("Query failed: " . $conn->error);
            }

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <div class='row'>
                            <div class='row_top'>
                                <div>
                                    <p style='margin-top: 0px; padding: 10px;'>
                                        <?php echo $row['shop_name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class='content'>
                                <div class="text">
                                    <p style="font-family:'Times New Roman', Times, serif; font-size: large;"><?php echo $row['shop_content']; ?></p>
                                </div>
                                <div class="image">
                                    <div class="img1">
                                        <img src='<?php echo $row['shop_image']; ?>'alt = "food">
                                    </div>
                                </div>
                                
                            </div>
                            <div class='row_down'>
                                <div style='padding: 9px; margin-left: 250px;'>
                                    <button type="button" name='like'
                                        style='padding: 2px; width: 50px; cursor: pointer;'>Like</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="container">
        <h2>Post</h2>

        <!-- Form to submit a post -->
        <form action="submit_post_shop.php" method="post" enctype="multipart/form-data">
            <textarea name="post_text" placeholder="Write your post"></textarea>
            <input type="file" name="post_image">
            <input type="submit" value="Post">
        </form>
    </div>
</div>
<div><h2>name</h2></div>
    <div class="footer">
        <?php include('footer.php') ?>
    </div>
</body>

</html>