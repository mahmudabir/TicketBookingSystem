<?php 
	require 'busdbconnect.php';

	if(isset($_POST['aid'])) {
		$db = new busdbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM books WHERE author_id = " . $_POST['aid']);
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
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