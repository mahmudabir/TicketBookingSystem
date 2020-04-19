<?php

include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$firstname = $lastname = $email =  $message = "";
$balance = $nid = 0;
$username = $_SESSION['username'];

$sql = "SELECT firstname, lastname, email, nid, balance from login WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount < 1) {
    $message = "User does not exist!";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $nid = $row['nid'];
        $balance = $row['balance'];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="showprofile.css">

</head>

<body>
    <div class="box">
        <form action="showprofile.php">
            <h1>Profile Info <i class="fas fa-users"></i></h1>
            <p>First Name</p><br>
            <input type="text" name="firstname" disabled value="<?php echo $firstname; ?>"><br>
            <p>Last Name</p><br>
            <input type="text" name="lastname" disabled value="<?php echo $lastname; ?>"><br>
            <p>Email Address <i class="far fa-envelope"></i></p><br>
            <input type="email" name="email" disabled value="<?php echo $email; ?>"><br>
            <p>National ID</p><br>
            <input type="number" name="nid" disabled value="<?php echo $nid; ?>"><br>
            <p>Balance <i class="fas fa-dollar-sign"></i></p><br>
            <input type="number" name="credit" disabled value="<?php echo $balance; ?>"><br>
            <span style="color:red">*If you don't have enough balance send money at our 'Bkash - 01755454545' and last 4 digit of sender number.</span>
        </form>
    </div>
</body>

</html>