<?php
include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
}

$oldpassword = $newpassword = $confirmnewpassword =  $username = $message = "";

$oldpasswordErr = $newpasswordErr = $confirmnewpasswordErr = $notmatchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['oldpassword'])) {
		$oldpasswordErr = "Old password cannot be empty!";
	} else {
		$oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
	}
	if (empty($_POST['newpassword'])) {
		$newpasswordErr = "New password cannot be empty!";
	} else {
		if (strlen($_POST['newpassword']) >= 8) {
			$newpassword = $_POST['newpassword'];
		} else {
			$newpasswordErr = "Password length must be atleast 8!";
		}
	}
	if (empty($_POST['confirmnewpassword'])) {
		$confirmnewpasswordErr = "Confirm password cannot be empty!";
	} else {
		if (strlen($_POST['confirmnewpassword']) >= 8) {
			$confirmnewpassword = $_POST['confirmnewpassword'];

			if ($newpassword != $confirmnewpassword) {
				$notmatchErr = "The new passwords does not match!";
			} else {
				$confirmnewpassword = mysqli_real_escape_string($conn, $_POST['confirmnewpassword']);
				$uPassToDB = password_hash($confirmnewpassword, PASSWORD_DEFAULT);

				$username = $_SESSION['username'];

				$sqlUserCheck = "SELECT username, password FROM login WHERE username = '$username'";
				$result = mysqli_query($conn, $sqlUserCheck);
				$rowCount = mysqli_num_rows($result);

				if ($rowCount < 1) {
					$message = "User does not exist!";
				} else {
					while ($row = mysqli_fetch_assoc($result)) {
						$uPassInDB = $row['password'];

						if (password_verify($oldpassword, $uPassInDB)) {
							$sql = "UPDATE login SET password='$uPassToDB' WHERE username='$username'";
							mysqli_query($conn, $sql);
							$message = "Password Successfully changed. :)";
						} else {
							$oldpasswordErr = "Wrong Password!";
						}
					}
				}
			}
		} else {
			$confirmnewpasswordErr = "Password length must be atleast 8!";
		}
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
		<form action="changepassword.php" method="POST">
			<p>Old Password</p>
			<input type="text" name="oldpassword" placeholder="Enter Old Password" required><br><span><?php echo $oldpasswordErr ?></span>
			<p>New Password</p>
			<input type="password" name="newpassword" placeholder="Enter New password" required><br><span><?php echo $newpasswordErr ?></span>
			<p>Confirm New Password</p>
			<input type="password" name="confirmnewpassword" placeholder="Confirm New password" required><br><span><?php echo $confirmnewpasswordErr ?><?php echo $notmatchErr ?></span>
			<input type="submit" name="" value="Submit">
			<span style="color:green"><?php echo $message ?></span>
			<!-- <a href="../login/login.php">Login Here</a> -->
		</form>
	</div>
</body>

</html>