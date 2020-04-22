<?php

//include "../mainpage/bus.php";
$mysqli = new mysqli("localhost", "root", "", "ticketdb");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT cost FROM bus_list WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
//$stmt->bind_param("n", $_GET['r']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cost);
$stmt->fetch();
$stmt->close();

$r = $_REQUEST["r"];


$tcost =  $r * $cost;

echo "<table>";
echo "<tr>";
echo "<th>Per Seat Cost: </th>";
echo "<td>" . $cost . "_____</td>";
echo "<th>Total Cost: </th>";
echo "<td>" . $tcost . "</td>";
echo "</tr>";
echo "</table>";
?>