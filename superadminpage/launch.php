<?php
include "../superadminpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$launchname = $source = $destination = $type = $cost = $seat = $launchid = "";
$launchnameErr = $sourceErr = $destinationErr = $typeErr = $costErr = $seatErr = $success = $launchidErr = "";


if (isset($_POST['Add'])) {
    # Add-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['launchname'])) {
            $launchnameErr = "Launch Name cannot be empty!";
        } else {
            $launchname = mysqli_real_escape_string($conn, $_POST['launchname']);
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
        if (!empty($launchname) && !empty($source) && !empty($destination) && !empty($type) && !empty($cost) && !empty($seat)) {
            $sql = "INSERT INTO launch_list (name, board, destination, type, cost, available_seat, total_seat) 
                VALUES ('$launchname', '$source', '$destination', '$type', '$cost', '$seat', '$seat');";
            mysqli_query($conn, $sql);

            $sql2 = "INSERT INTO launch_list (name, board, destination, type, cost, available_seat, total_seat) 
                VALUES ('$launchname', '$destination', '$source', '$type', '$cost', '$seat', '$seat');";
            mysqli_query($conn, $sql2);

            $success = "Successfully Submitted.";
        }
    }
} elseif (isset($_POST['Update'])) {
    # Update-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['busid'])) {
            $busidErr = "Launch Name cannot be empty!";
        } else {
            $launchid = mysqli_real_escape_string($conn, $_POST['launchid']);
        }

        if (!empty($launchid)) {
            $sql = "UPDATE launch_list SET available_seat='300' WHERE id='$launchid';";
            mysqli_query($conn, $sql);

            $success = "Done reset of available seat";
        }
    }
} elseif (isset($_POST['Delete'])) {
    # Delete-button was clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['launchid'])) {
            $launchidErr = "Launce Name cannot be empty!";
        } else {
            $launchid = mysqli_real_escape_string($conn, $_POST['launchid']);
        }

        if (!empty($launchid)) {
            $sql = "DELETE FROM launch_list WHERE id='$launchid';";
            mysqli_query($conn, $sql);

            $success = "Done reset of available seat";
        }
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="transport.css">
    <script>
        function reset_page() {
            window.location.reload();
        }
    </script>
</head>

<body>
    <div class="box">
        <h1>Launch Ticket Manage Here</h1>
        <form action="launch.php" method="post">
            <p>Launch Name</p>
            <input type="text" name="launchname" placeholder="Enter Launch Name" value="<?php echo $launchname; ?>"><br><span style="color:red;"> <?php echo $launchnameErr; ?> </span>
            <p>Source</p>
            <input type="text" name="source" placeholder="Enter City" value="<?php echo $source; ?>"><br><span style="color:red;"> <?php echo $sourceErr; ?> </span>
            <p>Destination</p>
            <input type="text" name="destination" placeholder="Enter city" value="<?php echo $destination; ?>"><br><span style="color:red;"> <?php echo $destinationErr; ?> </span>
            <p>Type</p>
            <select id="type" name="type">
                <option selected="" disabled="">Choose Launch Type</option>
                <option id="ac" value="ac">AC</option>
                <option id="nonac" value="nonac">Non Ac</option>
            </select><br>
            <p>Cost</p>
            <input type="number" name="cost" placeholder="Enter cost" value="<?php echo $cost; ?>"><br><span style="color:red;"> <?php echo $costErr; ?> </span>
            <p>Total Seat</p>
            <input type="number" name="seat" placeholder="Enter Seat Number" value="<?php echo $seat; ?>"><br><span style="color:red;"> <?php echo $seatErr; ?> </span><br>

            <input type="button" value="Reset Fields" onclick="reset_page()">
            <input type="submit" name="Add" value="Add Launch" style="margin-left:30px"><br><br>

            <p>Input the Launch ID you want to Reset or Delete</p>
            <input type="number" name="launchid" placeholder="Input Launch ID">

            <br><input type="submit" name="Update" value="Reset Av. Seat" style="margin-top:10px">
            <input type="submit" name="Delete" value="Delete Launch" style="margin-left:30px">
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Launch Name</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Avilable Seat</th>
                        <th>Total Seat</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT *FROM launch_list";
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