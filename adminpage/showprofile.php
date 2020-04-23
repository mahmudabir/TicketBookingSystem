<?php

include "../adminpage/common.inc.php";
/*
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
}*/
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>User Profile</title>
	<link rel="stylesheet" href="showprofile.css">

</head>

<body>
	<div class="box">
        <h1>Profile Info <i class="fas fa-users"></i></h1>
        <p>First Name</p><br>
        <input type="text" name="firstname" disabled><br>
        <p>Last Name</p><br>
        <input type="text" name="lastname" disabled><br>
        <p>Email Address <i class="far fa-envelope"></i></p><br>
        <input type="email" name="email" disabled><br>
        <p>National ID</p><br>
        <input type="number" name="nid" disabled><br>
        <p>Balance <i class="fas fa-dollar-sign"></i></p><br>
        <input type="number" name="credit" disabled><br>
        <span style="color:red">*If you don't have enough balance send money at our 'Bkash - 01755454545' and last 4 digit of sender number.</span>

    </div>
</body>

</html>