<?php


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ((!empty($_GET['r'])) && (!empty($_GET['q']))) {
        //include "../mainpage/bus.php";
        $mysqli = new mysqli("localhost", "root", "", "ticketdb");
        if ($mysqli->connect_error) {
            exit('Could not connect');
        }

        $sql = "SELECT cost FROM bus_list WHERE id = ?";
        $cost = 0;
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        //$stmt->bind_param("n", $_GET['r']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($cost);
        $stmt->fetch();
        $stmt->close();
        $r = $_REQUEST["r"];

        function rqst($cost, $r)
        {
            if (is_numeric($r) && is_numeric($cost)) {
                $tcost =  $r * $cost;
                return $tcost;
              } else {
                throw new Exception("First Select The requirment fields please.");
              }
        }

        try {
            $tcost = rqst($cost, $r);
            echo "<table>";
            echo "<tr>";
            echo "<th>Per Seat Cost: </th>";
            echo "<td>" . $cost . "_____</td>";
            echo "<th>Total Cost: </th>";
            echo "<td>" . $tcost . "</td>";
            echo "</tr>";
            echo "</table>";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Try again after clicking \"Reset\" button";
    }
}