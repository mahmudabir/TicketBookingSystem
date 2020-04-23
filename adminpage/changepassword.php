<?php
include "../adminpage/common.inc.php";
include "../db/db_connect.inc.php";
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
}

$oldpassword = $newpassword = $confirmnewpassword = "";

$oldpasswordErr = $newpasswordErr = $confirmnewpasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['oldpassword'])) {
		$oldpasswordErr = "Old password cannot be empty!";
	} else {
		$oldpassword = $_POST['oldpassword'];
	}
	if (empty($_POST['newpassword'])) {
		$newpasswordErr = "New password cannot be empty!";
	} else {
		$newpassword = $_POST['newpassword'];
	}
	if (empty($_POST['confirmnewpassword'])) {
		$confirmnewpasswordErr = "Confirm password cannot be empty!";
	} else {
		$confirmnewpassword = $_POST['confirmnewpassword'];
	}
}


?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="changepassword.css">
</head>

<body>
	<div class="loginbox">
		<h1>Password Change</h1>
		<form action="changepassword.php" method="post">
			<p>Old Password</p>
			<input type="text" name="oldpassword" placeholder="Enter Old Password"><br><span><?php echo $oldpasswordErr; ?></span>
			<p>New Password</p>
			<input type="password" name="newpassword" placeholder="Enter New password"><br><span><?php echo $newpasswordErr ?></span>
			<p>Confirm New Password</p>
			<input type="password" name="confirmnewpassword" placeholder="Confirm New password"><br><span><?php echo $confirmnewpasswordErr ?></span>
			<input type="submit" name="" value="Submit">
			<a href="../login/login.php">Login Here</a>

		</form>
	</div>
</body>

</html>