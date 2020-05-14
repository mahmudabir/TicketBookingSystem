<?php

include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
} else {
	$uname = $utype = $ufname = "";
	$uname = $_SESSION['username'];
	$sql = "SELECT * FROM login WHERE username='$uname'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$utype = $row['type'];
		$ufname = $row['firstname'];
	}
}






?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="mainpage.css">

</head>

<body>
	<div align="center">
		<p style="color: yellow">Hello, <?php echo strtoupper($uname); ?></p>
		<p style="color: yellow">Username: <?php echo $uname; ?></p>
		<p style="color: yellow">User Type: <?php echo $utype; ?></p>
	</div>
</body>

</html>