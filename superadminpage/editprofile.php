<?php
include "../superadminpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$firstname = $lastname = $email =  $message = $nid = "";
$balance = 0;
$firstnameErr = $lastnameErr = $emailErr = $nidErr = "";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['firstname'])){
        $firstnameErr = "Firstname Cannot be empty.";
    } else{
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    }
    if(empty($_POST['lastname'])){
        $firstnameErr = "Lastname Cannot be empty.";
    } else{
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    }
    if(empty($_POST['email'])){
        $firstnameErr = "Email Cannot be empty.";
    } else{
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(empty($_POST['nid'])){
        $firstnameErr = "National ID Cannot be empty.";
    } else{
        $nid = mysqli_real_escape_string($conn, $_POST['nid']);
    }

    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['nid'])){
    $sql = "UPDATE login SET firstname='$firstname', lastname='$lastname', email='$email', nid='$nid' WHERE username='$username'";
	mysqli_query($conn, $sql);
    $message = "Information Successfully changed. :)";
    }

}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="editprofile.css">
</head>

<body>
    <div class="box">
        <form action="editprofile.php" method="post">
            <h1>Edit Your Profile <i class="fas fa-pen"></i></h1>
            <p>First Name</p><br>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
            <p>Last Name</p><br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
            <p>Email Address <i class="far fa-envelope"></i></p><br>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <p>National ID</p><br>
            <input type="number" name="nid" value="<?php echo $nid; ?>"><br>
            <input type="submit" value="Confirm"><br>
        </form>
    </div>
</body>

</html>