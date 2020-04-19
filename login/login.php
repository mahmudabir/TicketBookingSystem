<?php

include "../db/db_connect.inc.php";

session_start();
$username = $password = "";
$usernameErr = $passwordErr = $message = $result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST['username'])) {
		$usernameErr = "Username cannot be empty!";
	} else {
		$username =  mysqli_real_escape_string($conn, $_POST['username']);
	}
	if (empty($_POST['password'])) {
		$passwordErr = "Password cannot be empty!";
	} else {
		$password =  mysqli_real_escape_string($conn, $_POST['password']);
	}

	$sqlUserCheck = "SELECT username, password FROM login WHERE username = '$username'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if ($rowCount < 1) {
		$message = "User does not exist!";
	} else {
		while ($row = mysqli_fetch_assoc($result)) {
			$uPassInDB = $row['password'];

			if (password_verify($password, $uPassInDB)) {
				$_SESSION['username'] = $username;
				//$message = "Password Matched!";
				header("Location: ../mainpage/mainpage.php");
			} else {
				$message = "Wrong Password!";
			}
		}
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>
	<div class="loginbox">
		<img src="user.png" class="avatar">
		<h1>Login Here</h1>
		<form action="login.php" method="POST">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>"><br><span><?php echo $usernameErr; ?></span>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password"><br><span><?php echo $passwordErr ?></span>
			<span style="color:red"><?php echo $message; ?></span>
			<input type="submit" name="" value="Login">
			<a href="../changepassword/changepassword.php">Forget password?</a><br>
			<a href="../signup/signup.php">Don't have an account?</a>

		</form>
	</div>
</body>

</html>