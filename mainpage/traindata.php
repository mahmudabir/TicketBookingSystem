<?php 
	require 'traindbconnect.php';

	if(isset($_POST['bid']) && isset($_POST['did']) && isset($_POST['ttype'])) {
		$db = new traindbconnect;
		$conn = $db->connect();

		$board = $_POST['bid']; 
		$destination = $_POST['did'];
		$traintype = $_POST['ttype'];
		$stmt = $conn->prepare("SELECT * FROM train_list WHERE board = '$board' and destination = '$destination' and available_seat > 0 and type = '$traintype' " );
		$stmt->execute();
		$train_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($train_list);
	}

	function load_train_board() {
		$db = new traindbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT board FROM train_list ORDER By board");
		$stmt->execute();
		$train_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $train_list;
	}

	function load_train_destination() {
		$db = new traindbconnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT destination FROM train_list ORDER BY destination");
		$stmt->execute();
		$train_list2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $train_list2;
	}

 ?>