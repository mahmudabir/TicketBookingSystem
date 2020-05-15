<?php
    include "../superadminpage/common.inc.php";
    
    $username = $firstname = $lastname = $email = $nid = $password= $uNameInDB = $uNameInDBerr =$success="";
    $fNameErr = $lNameErr = $emailErr =  $nidErr = $usernameErr = $pass="";
    $password='admin';
    $pass=password_hash($password,PASSWORD_DEFAULT);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            $usernameErr = "Username cannot be empty!";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
        }
        if (empty($_POST['firstname'])) {
            $fNameErr = "First Name cannot be empty!";
        } else {
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        }
        if (empty($_POST['lastname'])) {
            $lNameErr = "Last Name cannot be empty!";
        } else {
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        }
        if (empty($_POST['email'])) {
            $emailErr = "Please provide valid Email";
        } else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
        }
        if (empty($_POST['nid'])) {
            $nidErr = "National ID cannot be empty!";
        } else {
            $nid = mysqli_real_escape_string($conn, $_POST['nid']);
        }  
    }
    $sqlUserCheck = "SELECT username FROM login WHERE username = '$username'";
    $result = mysqli_query($conn, $sqlUserCheck);
    while ($row = mysqli_fetch_assoc($result)) {
		$uNameInDB = $row['username'];
    }
    if (!empty($username) &&!empty($firstname) && !empty($lastname) && !empty($email) && !empty($nid)) {
		if ($uNameInDB == $username) {
			$uNameInDBerr = "Username already taken!";
        }
        else {
			$sql = "INSERT INTO login (username,firstname, lastname, email, nid, password,balance,type) 
		VALUES ('$username','$firstname','$lastname', '$email', '$nid', '$pass','0' ,'admin');";
			mysqli_query($conn, $sql);

			$username = $firstname = $lastname = $email = $nid = $password = $uPassToDB = $result = "";
			$success = "Successfully Submitted.";
		}
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="addadmin.css">
    </head>
    <body>
        <div class="box">
            <h1>Add Admin</h1>
            <form action="addadmin.php" method="post" onsubmit="return validate();">
                <p>username</p>
                <input type="text" name="username" placeholder="Enter Username" ><br><span style="color:red;"> <?php echo $uNameInDBerr; ?><?php echo $usernameErr; ?> </span>
                <p>firstname</p></p>
                <input type="text" name="firstname" placeholder="Enter First Name" value="<?php echo $firstname; ?>"><br><span style="color:red;"> <?php echo $fNameErr; ?> </span>
                <p>lastname</p>
                <input type="text" name="lastname" placeholder="Enter Last Name" value="<?php echo $lastname; ?>"><br><span style="color:red;"><?php echo $lNameErr; ?> </span>
                <p>email</p>
                <input type="email" name="email" placeholder="Enter email" value="<?php echo $email; ?>"><br><span style="color:red;"><?php echo $emailErr; ?></span>
                <p>NID</p>
                <input type="text" name="nid" placeholder="Enter National ID" value="<?php echo $nid; ?>"><br><span style="color:red;"> <?php echo $nidErr; ?> </span>
                <span style="color:green;"> <?php echo $success; ?> </span>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>