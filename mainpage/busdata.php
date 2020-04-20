<?php 
	require 'busdbconnect.php';

	if(isset($_POST['bid'])) {
		$db = new busdbconnect;
		$conn = $db->connect();

		$board = $_POST['bid']; 
		//$destination = $_POST['did'];
		//$stmt = $conn->prepare("SELECT * FROM bus_list WHERE board = '$board' and destination = '$destination' and available_seat > 0 " );
		$stmt = $conn->prepare("SELECT * FROM bus_list WHERE board = '$board'" );
		$stmt->execute();
		$bus_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($bus_list);
	}

	function load_bus_list() {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM bus_list");
		$stmt->execute();
		$bus_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $bus_list;
	}

	function load_bus_list2() {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM bus_list");
		$stmt->execute();
		$bus_list2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $bus_list2;
	}

 ?>