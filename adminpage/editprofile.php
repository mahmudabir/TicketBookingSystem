<?php
    include "../adminpage/common.inc.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="editprofile.css">
    </head>
    <body>
        <div class="box">
            <form action="editprofile.php" method="post">
                <h1>Edit Your Profile <i class="fas fa-pen"></i></h1>
                <p>First Name</p><br>
                <input type="text" name="firstname" ><br>
                <p>Last Name</p><br>
                <input type="text" name="lastname" ><br>
                <p>Email Address <i class="far fa-envelope"></i></p><br>
                <input type="email" name="email" ><br>
                <p>National ID</p><br>
                <input type="number" name="nid" ><br>
                <input type="submit" value="Confirm"><br>
            </form>
        </div>
    </body>
</html>