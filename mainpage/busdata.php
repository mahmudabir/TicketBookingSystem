<?php 
	require 'busdbconnect.php';

	if(isset($_POST['bid']) && isset($_POST['did'])) {
		$db = new busdbconnect;
		$conn = $db->connect();

		$board = $_POST['bid']; 
		$destination = $_POST['did'];
		$stmt = $conn->prepare("SELECT * FROM bus_list WHERE board = '$board' and destination = '$destination' and available_seat > 0" );
		$stmt->execute();
		$bus_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($bus_list);
	}

	function load_bus_board() {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT board FROM bus_list ORDER By board");
		$stmt->execute();
		$bus_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $bus_list;
	}

	function load_bus_destination() {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT destination FROM bus_list ORDER BY destination");
		$stmt->execute();
		$bus_list2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $bus_list2;
	}

 ?>