<?php 
	require 'busdbconnect.php';

	if(isset($_POST['bid'])) {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM bus_list WHERE id = " . $_POST['bid']);
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