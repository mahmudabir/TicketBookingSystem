<?php

//include "../mainpage/train.php";
$mysqli = new mysqli("localhost", "root", "", "ticketdb");
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT cost FROM train_list WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
//$stmt->bind_param("n", $_GET['r']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cost);
$stmt->fetch();
$stmt->close();

function rqst($cost)
{
    $r = $_REQUEST["r"];
    if ($tcost =  $r * $cost) {
        return $tcost;
    } else {
        //$message = "First Select Seat number & type.";
        throw new Exception("First Select Seat number & type.");
    }
}

try {
    $tcost = rqst($cost);
    echo "<table>";
    echo "<tr>";
    echo "<th>Per Seat Cost: </th>";
    echo "<td>" . $cost . "_____</td>";
    echo "<th>Total Cost: </th>";
    echo "<td>" . $tcost . "</td>";
    echo "</tr>";
    echo "</table>";
} catch (Exception $e) {
    echo "Message: " . $e->getMessage();
}
