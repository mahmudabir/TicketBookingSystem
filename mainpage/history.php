<?php
    include "../mainpage/common.inc.php";
    include "../db/db_connect.inc.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login/login.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>History</title>
        <link rel="stylesheet" href="history.css">

    </head>
    <body>
        <div class="table">
            <h1>History Table</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>BUS ID</th>
                    <th>Seat</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
                <?php
                    $sql = "SELECT * from bus_history";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if($rowCount > 0){
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['bus_id']."</td><td>".$row['seat']."</td><td>".$row['date']."</td><td>".$row['payment']."</td><td>".$row['status']."</td><tr>";
                        }
                        echo "</table>";
                    }
                ?>
            </table>
        </div>
        <script type="text/javascript">
            const historyBody= document.querySelector("#history-table>tbody");

            console.log(historyBody);
        </script>
    </body>
</html>