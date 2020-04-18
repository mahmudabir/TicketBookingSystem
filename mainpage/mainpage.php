<?php

include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
}



?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>welcome</title>
	<link rel="stylesheet" href="mainpage.css">

</head>

<body>
</body>

</html>