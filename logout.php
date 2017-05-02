<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
        <?php 
            require_once('includes/config.php');
            include 'includes/header.php';
        ?>
	</head>

	<body>
        <header>
            <h1>Queen of Schmooze</h1>
        </header>
        <?php
            global $current_page;
            $current_page = "Home";
            include "includes/nav.php"
        ?>
        <div class="log_out">
            <form method="post" action="home.php">
                <p>Already signed in, want to log out?</p>
                <input type="submit" name="logout" value="Log Out">

            </form>
                <?php
                if (isset($_POST['logout'])) {
                    session_destroy();
                }


        ?>
        </div>
    </body>
</html>
