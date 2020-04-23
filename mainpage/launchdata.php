<?php 
	require 'launchdbconnect.php';

	if(isset($_POST['bid']) && isset($_POST['did']) && isset($_POST['ttype'])) {
		$db = new launchdbconnect;
		$conn = $db->connect();

		$board = $_POST['bid']; 
		$destination = $_POST['did'];
		$launchtype = $_POST['ttype'];
		$stmt = $conn->prepare("SELECT * FROM launch_list WHERE board = '$board' and destination = '$destination' and available_seat > 0 and type = '$traintype' " );
		$stmt->execute();
		$launch_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($launch_list);
	}

	function load_launch_board() {
		$db = new launchdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT board FROM launch_list ORDER By board");
		$stmt->execute();
		$launch_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $launch_list;
	}

	function load_launch_destination() {
		$db = new launchdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT destination FROM launch_list ORDER BY destination");
		$stmt->execute();
		$launch_list2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $launch_list2;
	}

 ?>