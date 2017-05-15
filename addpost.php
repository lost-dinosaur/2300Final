<?php
    session_start();
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Add Post</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <?php 
            require_once('includes/config.php');
            include 'includes/header.php';
        ?>
	</head>

	<body>
        <header>
            <img src="images/Logo.png" alt="Logo">
        </header>
        <?php
            global $current_page;
            $current_page = "Blog";
            include "includes/nav.php"
        ?>
        <div class="container">
            <div class="home col-sm-6">
                <form method="post">
                    <div class="field">
                        <label>Title</label>
                        <input name="title" id="title_field" type="text" placeholder="Enter a Title">
                    </div>
                    <div class="field">
                        <label>Description</label>
                        <input name="desc" id="desc_field" type="text" placeholder="Enter a Description">
                    </div>
                    <div class="field">
                        <label>Content</label>
                        <input name="content" id="content_field" type="text" placeholder="Enter the Content for your blog post">
                    </div>
                    <div class="field">
                        <input id="submit" name="submit" type="submit" value="Submit"> 
                    </div>
                </form>
            </div>
        </div>
        
        <?php
            require_once 'includes/config.php';
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if (isset($_POST["submit"])) {
                if (empty($_POST['title'])) {
                    echo "<p>Please Enter A Title</p>";
                } if (empty($_POST['desc'])) {
                    echo "<p>Please Enter A Description</p>";
                } if (empty($_POST['content'])) {
                    echo "<p>Please Enter Content</p>";
                } else {
                    $postTitle = htmlspecialchars(trim($_POST['title']));
                    $postDesc = htmlspecialchars(trim($_POST['desc']));
                    $postCont = htmlspecialchars(trim($_POST['content']));
                    $date = date('Y-m-d h:i:s');
                    $add_post = $mysqli->query("INSERT INTO blog_posts(postTitle, postDesc, postCont, postDate) VALUES ('$postTitle','$postDesc', '$postCont', '$date')");
                    echo "<p>Your blog post was created successfully!</p>";
                }

            }
    

?>
<!--
        //postID
        //postTitle
        //postDesc
        //postCont
        //postDate (2013-05-29 00:00:00)
    date("d-m-Y h:i:s");
$date = date('Y-m-d h:i:s');
                        echo "$date";
-->

	</body>
</html>