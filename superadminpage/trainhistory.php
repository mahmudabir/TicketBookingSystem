<?php
    include "../superadminpage/common.inc.php";
    
    /*For Cancel Order*/
$id = $idErr = $username = $train_id = $seat = $payment = "";
$payment = $seat = $balance = $balanceInDB = $return_payment = 0; 
if (isset($_POST['Confirm'])) {
    if (empty($_POST['id'])) {
        $idErr = "This Field Cannot be empty!";
    } else {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
    }
    if (!empty($id)) {
        $sql_Get_History = "SELECT * FROM train_history WHERE id='$id' AND status='paid'";
        $result = mysqli_query($conn, $sql_Get_History);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount < 1) {
            $idErr = "The history with this ID is already canceled or wrong input!";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $train_id = $row['train_id'];
                $seat = $row['seat'];
                $payment = $row['payment'];
            }
            //return seat to available seat
            $sql_return_seat = "UPDATE train_list SET available_seat='$seat' WHERE id='$train_id'";
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
            $sqll = "UPDATE train_history SET status='canceled' WHERE id='$id';";
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
        <h1>Train History Table</h1>
        <section>
        <div class="tab2">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Train Name</th>
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
                    $rpp1=05;
                    isset($_GET['page'])?$pageno =$_GET['page']:$pageno=0;
                    if($pageno>1){
                        $start1 =($pageno * $rpp1)-$rpp1;
                    }else{
                        $start1=0;
                    }
                    $sqli1="SELECT *FROM train_history";
                    $resultSet1=mysqli_query($conn,$sqli1);
                    $numRows1=mysqli_num_rows($resultSet1);
                    $totalpages1=ceil($numRows1/$rpp1);
                    /*pagination*/
                    $sql = "SELECT train_history.id, train_history.username, train_list.name, train_list.board, train_list.destination, train_history.seat, train_history.date, train_history.payment,train_history.status FROM train_history INNER JOIN train_list ON train_history.train_id = train_list.id LIMIT $start1,$rpp1";
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
                    if($pageno>1)
                    {
                        echo "<a href='?page=".($pageno-1)."' class='btn'>Previous<</a>";
                    }
                    for($x=1;$x <= $totalpages1;$x++){
                        echo "<a href='?page=$x' class='btn'>   $x</a>";
                    }
                    if($x>1)
                    {
                        echo "<a href='?page=".($pageno+1)."' class='btn'>Next></a>";
                    }
                    /*pagination*/
                    ?>
                </table>
            </div>
        </section>
        <form action="trainhistory.php" method="post">
            <span style="color:red"><?php echo $idErr?></span><br>
            <label>Cancel Order here! <input type="number" name="id" placeholder="Enter Order Id here"> <input type="submit" name="Confirm" value="Confirm"></label>
        </form>
    </div>
</body>

</html>