<?php
include "../adminpage/common.inc.php";

/*For Cancel Order*/
$id = $idErr = $username = $launch_id = $seat = $payment = "";
$payment = $seat = $balance = $balanceInDB = $return_payment = 0;
if (isset($_POST['Confirm'])) {
    if (empty($_POST['id'])) {
        $idErr = "This Field Cannot be empty!";
    } else {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
    }
    if (!empty($id)) {
        $sql_Get_History = "SELECT * FROM launch_history WHERE id='$id' AND status='paid'";
        $result = mysqli_query($conn, $sql_Get_History);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount < 1) {
            $idErr = "The history with this ID is already canceled or wrong input!";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $launch_id = $row['launch_id'];
                $seat = $row['seat'];
                $payment = $row['payment'];
            }
            //return seat to available seat
            $sql_return_seat = "UPDATE launch_list SET available_seat='$seat' WHERE id='$launch_id'";
            mysqli_query($conn, $sql_return_seat);

            //return 90% of payment
            $return_payment = $payment * 0.9;
            $sql_get_balance = "SELECT balance FROM login WHERE username='$username'";
            $balanceResult = mysqli_query($conn, $sql_get_balance);

            while ($row = mysqli_fetch_assoc($balanceResult)) {
                $balanceInDB = $row['balance'];
            }
            $balance = $balanceInDB + $return_payment;
            $sql_return_payment = "UPDATE login SET balance='$balance' WHERE username='$username'";
            mysqli_query($conn, $sql_return_payment);

            //update the history status to canceled
            $sqll = "UPDATE launch_history SET status='canceled' WHERE id='$id';";
            mysqli_query($conn, $sqll);

            $payment = $seat = $balance = $balanceInDB = $return_payment = 0;
            $idErr = "Booking canceling successful.";
        }
    }
}
/*For Cancel Order*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="history.css">
</head>

<body>
    <div class="table">
        <h1>Launch History Table</h1>
        <section>
            <div class="tab3">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Launch Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <?php
                    /*pagination*/
                    $rpp2 = 05;
                    isset($_GET['page']) ? $page1 = $_GET['page'] : $page1 = 0;
                    if ($page1 > 1) {
                        $start2 = ($page1 * $rpp2) - $rpp2;
                    } else {
                        $start2 = 0;
                    }
                    $sqli2 = "SELECT *FROM launch_history";
                    $resultSet2 = mysqli_query($conn, $sqli2);
                    $numRows2 = mysqli_num_rows($resultSet2);
                    $totalpages2 = ceil($numRows2 / $rpp2);
                    /*pagination*/
                    $sql = "SELECT launch_history.id, launch_history.username, launch_list.name, launch_list.board, launch_list.destination, launch_history.seat, launch_history.date, launch_history.payment,launch_history.status FROM launch_history INNER JOIN launch_list ON launch_history.launch_id = launch_list.id LIMIT $start2,$rpp2";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tbody>
                            <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['board'] . "</td>
                            <td>" . $row['destination'] . "</td>
                            <td>" . $row['seat'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['payment'] . "</td>
                            <td>" . $row['status'] . "</td>
                            </tr>
                            </tbody>";
                        }
                        echo "</table>";
                    } else {
                        echo $message = "No History!";
                    }
                    /*pagination*/
                    if ($page1 > 1) {
                        echo "<a href='?page=" . ($page1 - 1) . "' class='btn'>Previous<</a>";
                    }
                    for ($x = 1; $x <= $totalpages2; $x++) {
                        echo "<a href='?page=$x' class='btn'>   $x</a>";
                    }
                    if ($x > 1) {
                        echo "<a href='?page=" . ($page1 + 1) . "' class='btn'>Next</a>";
                    }
                    /*pagination*/
                    ?>
                </table>
            </div>
        </section>
        <form action="launchhistory.php" method="post">
            <span style="color:red"><?php echo $idErr ?></span><br>
            <label>Cancel Order here! <input type="number" name="id" placeholder="Enter Order Id here"> <input type="submit" name="Confirm" value="Confirm"></label>
        </form>
    </div>
</body>

</html>