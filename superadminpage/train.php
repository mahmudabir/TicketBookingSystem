<?php
include "../superadminpage/common.inc.php";


$trainname = $source = $destination = $type = $cost = $seat = $trainid = "";
$trainnameErr = $sourceErr = $destinationErr = $typeErr = $costErr = $seatErr = $success = $trainidErr = "";


if (isset($_POST['Add'])) {
    # Add-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['trainname'])) {
            $busnameErr = "Train Name cannot be empty!";
        } else {
            $trainname = mysqli_real_escape_string($conn, $_POST['trainname']);
        }
        if (empty($_POST['source'])) {
            $sourceErr = "Source cannot be empty!";
        } else {
            $source = mysqli_real_escape_string($conn, $_POST['source']);
        }
        if (empty($_POST['destination'])) {
            $destinationErr = "Destination cannot be empty!";
        } else {
            $destination = mysqli_real_escape_string($conn, $_POST['destination']);
        }
        if (empty($_POST['type'])) {
            $typeErr = "Type cannot be empty!";
        } else {
            $type = mysqli_real_escape_string($conn, $_POST['type']);
        }
        if (empty($_POST['cost'])) {
            $costErr = "Cost cannot be empty!";
        } else {
            $cost = mysqli_real_escape_string($conn, $_POST['cost']);
        }
        if (empty($_POST['seat'])) {
            $seatErr = "Seat cannot be empty!";
        } else {
            $seat = mysqli_real_escape_string($conn, $_POST['seat']);
        }
        if (!empty($trainname) && !empty($source) && !empty($destination) && !empty($type) && !empty($cost) && !empty($seat)) {
            $sql = "INSERT INTO train_list (name, board, destination, type, cost, available_seat, total_seat) 
                VALUES ('$trainname', '$source', '$destination', '$type', '$cost', '$seat', '$seat');";
            mysqli_query($conn, $sql);

            $sql2 = "INSERT INTO train_list (name, board, destination, type, cost, available_seat, total_seat) 
                VALUES ('$trainname', '$destination', '$source', '$type', '$cost', '$seat', '$seat');";
            mysqli_query($conn, $sql2);

            $success = "Successfully Submitted.";
        }
    }
} elseif (isset($_POST['Update'])) {
    # Update-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['trainid'])) {
            $trainidErr = "Train Name cannot be empty!";
        } else {
            $trainid = mysqli_real_escape_string($conn, $_POST['trainid']);
        }

        if (!empty($trainid)) {
            $sql = "UPDATE train_list SET available_seat='240' WHERE id='$trainid';";
            mysqli_query($conn, $sql);

            $success = "Done reset of available seat";
        }
    }
} elseif (isset($_POST['Delete'])) {
    # Delete-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['trainid'])) {
            $trainidErr = "Train Name cannot be empty!";
        } else {
            $trainid = mysqli_real_escape_string($conn, $_POST['trainid']);
        }

        if (!empty($trainid)) {
            $sql = "DELETE FROM train_list WHERE id='$trainid';";
            mysqli_query($conn, $sql);

            $success = "Done reset of available seat";
        }
    }

}elseif(isset($_POST['Reset'])){
    header("Location: ../superadminpage/train.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="transport.css">
    <script>
        
    </script>
</head>

<body>
    <div class="box">
        <h1>Train Ticket Manage Here</h1>
        <form action="train.php" method="post">
            <p>Train Name</p>
            <input type="text" name="trainname" placeholder="Enter Train Name" value="<?php echo $trainname; ?>"><br><span style="color:red;"> <?php echo $trainnameErr; ?> </span>
            <p>Source</p>
            <input type="text" name="source" placeholder="Enter City" value="<?php echo $source; ?>"><br><span style="color:red;"> <?php echo $sourceErr; ?> </span>
            <p>Destination</p>
            <input type="text" name="destination" placeholder="Enter city" value="<?php echo $destination; ?>"><br><span style="color:red;"> <?php echo $destinationErr; ?> </span>
            <p>Type</p>
            <select id="type" name="type">
                <option selected="" disabled="">Choose Train Type</option>
                <option id="ac" value="ac">AC</option>
                <option id="nonac" value="nonac">Non Ac</option>
            </select><br>
            <p>Cost</p>
            <input type="number" name="cost" placeholder="Enter cost" value="<?php echo $cost; ?>"><br><span style="color:red;"> <?php echo $costErr; ?> </span>
            <p>Total Seat</p>
            <input type="number" name="seat" placeholder="Enter Seat Number" value="<?php echo $seat; ?>"><br><span style="color:red;"> <?php echo $seatErr; ?> </span><br>

            <input type="button" name="Reset" value="Reset Fields">
            <input type="submit" name="Add" value="Add Train" style="margin-left:30px"><br><br>

            <p>Input the Train ID you want to Reset or Delete</p>
            <input type="number" name="trainid" placeholder="Input Train ID">

            <br><input type="submit" name="Update" value="Reset Av. Seat" style="margin-top:10px">
            <input type="submit" name="Delete" value="Delete Train" style="margin-left:30px">
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Train Name</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Avilable Seat</th>
                        <th>Total Seat</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT *FROM train_list";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tbody>
                                <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['board'] . "</td>
                                <td>" . $row['destination'] . "</td> 
                                <td>" . $row['type'] . "</td>
                                <td>" . $row['cost'] . "</td>
                                <td>" . $row['available_seat'] . "</td>
                                <td>" . $row['total_seat'] . "</td>
                                </tr>
                            </tbody>";
                    }
                    echo "</table>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>