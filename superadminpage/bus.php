<?php
    include "../superadminpage/common.inc.php";
    include "../db/db_connect.inc.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../login/login.php");
    }
    $busname= $source= $destination= $type= $cost= $seat="";
    $busnameErr= $sourceErr= $destinationErr= $typeErr=$costErr=$seatErr=$success="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['busname'])) {
            $busnameErr = "Bus Name cannot be empty!";
        } else {
            $busname = mysqli_real_escape_string($conn, $_POST['busname']);
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
        if(!empty($busname) && !empty($source) && !empty($destination) && !empty($type) && !empty($cost) && !empty($seat)){
            $sql = "INSERT INTO bus_list (busname,source,destination,type,cost,seat) 
		    VALUES ('$busname','$source','$destination','$type','$cost','$seat');";
			mysqli_query($conn, $sql);
			$success = "Successfully Submitted.";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bus.css">
    </head>
    <body>
        <div class="box">
            <h1>Bus Ticket Manage Here</h1>
            <form action="bus.php" method="post">
                <p>Bus Name</p>
                <input type="text" name="busname" placeholder="Enter Bus Name" value="<?php echo $busname; ?>"><br><span style="color:red;"> <?php echo $busnameErr; ?> </span>
                <p>Source</p>
                <input type="text" name="source" placeholder="Enter City" value="<?php echo $source; ?>"><br><span style="color:red;"> <?php echo $sourceErr; ?> </span>
                <p>Destination</p>
                <input type="text" name="destination" placeholder="Enter city" value="<?php echo $destination; ?>"><br><span style="color:red;"> <?php echo $destinationErr; ?> </span>
                <p>Type</p>
                <select id="type" name="type">
                    <option selected="" disabled="">Choose Bus Type</option>
                    <option id="ac" value="ac">AC</option>
                    <option id="nonac" value="nonac">Non Ac</option>
                </select><br>
                <p>Cost</p>
                <input type="number" name="cost" placeholder="Enter cost" value="<?php echo $cost; ?>"><br><span style="color:red;"> <?php echo $costErr; ?> </span>
                <p>Total Seat</p>
                <input type="number" name="seat" placeholder="Enter Seat Number" value="<?php echo $seat; ?>"><br><span style="color:red;"> <?php echo $seatErr; ?> </span><br>
                <input type="reset">
                <input type="submit" value="Add"><br>
                <input type="submit" value="Update"style="margin-top:10px">
                <input type="submit" value="Delete">
            </form>
            <div align="right" class="table">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bus Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Type</th>
                            <th>Cost</th>
                            <th>Avilable Seat</th>
                            <th>Total Seat</th>
                        </tr>
                    </thead>
                    <?php
                        $sql="SELECT *FROM bus_list";
                        $result=mysqli_query($conn,$sql);
                        $rowCount=mysqli_num_rows($result);
                        if($rowCount>0){
                            while($row=mysqli_fetch_assoc($result)){
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