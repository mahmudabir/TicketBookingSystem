<?php

include "../db/db_connect.inc.php";

$firstname = $lastname = $email = $nid = $username = $password = $uPassToDB = $result = "";
$fNameErr = $lNameErr = $emailErr =  $nidErr = $usernameErr = $passErr = $uNameInDB = $uNameInDBerr = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['firstname'])) {
		$fNameErr = "First Name cannot be empty!";
	} else {
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	}
	if (empty($_POST['lastname'])) {
		$lNameErr = "Last Name cannot be empty!";
	} else {
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	}
	if (empty($_POST['email'])) {
		$emailErr = "Please provide valid Email";
	} else {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
	}
	if (empty($_POST['nid'])) {
		$nidErr = "National ID cannot be empty!";
	} else {
		$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	}
	if (empty($_POST['username'])) {
		$usernameErr = "Username cannot be empty!";
	} else {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
	}
	if (empty($_POST['password'])) {
		$passErr = "Password cannot be empty!";
	} else {
		if(strlen($_POST['password'])>=8){
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$uPassToDB = password_hash($password, PASSWORD_DEFAULT);
	}else{
		$passErr = "Password length must be atleast 8!";
	}
	}


	

	$sqlUserCheck = "SELECT username FROM login WHERE username = '$username'";
	$result = mysqli_query($conn, $sqlUserCheck);

	while ($row = mysqli_fetch_assoc($result)) {
		$uNameInDB = $row['username'];
	}

	if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($nid) && !empty($username) && !empty($password)) {
		if ($uNameInDB == $username) {
			$uNameInDBerr = "Username already taken!";
		} else {
			$sql = "INSERT INTO login (firstname, lastname, email, nid, username, password, type) 
		VALUES ('$firstname','$lastname', '$email', '$nid', '$username', '$uPassToDB', 'user');";
			mysqli_query($conn, $sql);

			$firstname = $lastname = $email = $nid = $username = $password = $uPassToDB = $result = "";
			$success = "Successfully Submitted.";
		}
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<link rel="stylesheet" href="signup.css">
</head>

<body>
	<div class="wrap">
		<h2>Sign Up Here</h2>
		<form action="signup.php" method="POST">
			<input type="text" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>"><span style="color:red;"> <?php echo $fNameErr; ?> </span>
			<input type="text" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>"><span style="color:red;"> <?php echo $lNameErr; ?> </span>
			<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"><span style="color:red;"><?php echo $emailErr; ?></span>
			<input type="number" name="nid" placeholder="National ID" value="<?php echo $nid; ?>"><span style="color:red;"> <?php echo $nidErr; ?> </span>
			<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"><span style="color:red;"> <?php echo $uNameInDBerr; ?><?php echo $usernameErr; ?> </span>
			<input type="Password" name="password" placeholder="Password"><span style="color:red;"> <?php echo $passErr; ?> </span>
			<span style="color:green;"> <?php echo $success; ?> </span>
			<input type="submit" value="Submit"><br>
			<p><b>Or Log In <a href="../login/login.php">here</a></b></p>

		</form>
	</div>
</body>

</html>