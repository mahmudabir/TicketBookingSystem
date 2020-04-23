<?php
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="common.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
		<input type="checkbox" id="check">
		<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
		</label>
		<nav class="sidebar">
			<header>Ticket Booking System</header>
			<ul class="pop">
				<li><a href="#"><i class="fas fa-user-circle"></i>Profile<span class="sub_arrow"></span></a>
				<ul>
					<li><a href="../superadminpage/showprofile.php"><i class="fas fa-address-card"></i>Show Profile</a></li>
					<li><a href="../superadminpage/editprofile.php"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
					<li><a href="../superadminpage/changepassword.php"><i class="fas fa-key"></i>Change Password</a></li>
					<li><a href="../superadminpage/addadmin.php"><i class="fas fa-user-plus"></i>Add Admin</a></li>
					<li><a href="../superadminpage/history.php"><i class="fas fa-history"></i>History</a></li>
					<li><a href="../superadminpage/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				</ul></li>
				<li><a href="../superadminpage/manageuser.php"><i class="fas fa-user-edit"></i>Manage User</a></li>
				<li><a href="../superadminpage/bus.php"><i class="fas fa-bus"></i>Bus</a></li>
				<li><a href="../superadminpage/train.php"><i class="fas fa-train"></i>Train</a></li>
				<li><a href="../adminpage/launch.php"><i class="fas fa-ship"></i>Launch</a></li>
			</ul>
			<div class="social_media">
				<a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
				<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
				<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
			</div>
		</nav>	
	</body>
</html>