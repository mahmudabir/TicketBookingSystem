<?php
    include "../superadminpage/common.inc.php";
    
    $id= $idErr="";
    if(isset($_POST['confirm'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['id'])) {
                $idErr = "**This Field cannot be empty!";
            } else {
                $id = mysqli_real_escape_string($conn, $_POST['id']);
            }
    
            if (!empty($id)) {
                $sql = "DELETE FROM login WHERE id='$id';";
                mysqli_query($conn, $sql);
            }
        }
    }
    $password='user';
    $pass=password_hash($password,PASSWORD_DEFAULT);
    $id1=$id1Err="";
    if(isset($_POST['submit'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['id1'])) {
                $idErr = "**This Field cannot be empty!";
            } else {
                $id1 = mysqli_real_escape_string($conn, $_POST['id1']);
            }
    
            if (!empty($id1)) {
                $sql = "UPDATE login SET password='$pass' WHERE id='$id1';";
                mysqli_query($conn, $sql);
            }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="manageuser.css">
    </head>
    <body>
        <div class="box">
            <h1>Manage User</h1>
            <section class="border">
                <div class="w3-bar w3-black">
                    <button class="w3-bar-item w3-button" onclick="openTab('tab1')">Remove User</button>
                    <button class="w3-bar-item w3-button" onclick="openTab('tab2')">Change User Password</button>
                </div>

                <div id="tab1" class="w3-container tab">
                    <form action="manageuser.php" method="post">
                        <p>Enter ID for Remove any user</p>
                        <input type="number" name="id" style="margin-top:15px;"><br><span style="color:red;"><?php echo $idErr?></span><br>
                        <input type="submit" value="Confirm" name="confirm" style="margin-top:15px;">
                    </form>
                    <div class="table">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>NID</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT id,username,firstname,lastname,email,nid,type FROM login WHERE type='user'";
                            $result = mysqli_query($conn, $sql);
                            $rowCount = mysqli_num_rows($result);
                            if ($rowCount > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tbody>
                                            <tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['username'] . "</td>
                                            <td>" . $row['firstname'] . "</td>
                                            <td>" . $row['lastname'] . "</td> 
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['nid'] . "</td>
                                            <td>" . $row['type'] . "</td>
                                            </tr>
                                        </tbody>";
                                }
                                echo "</table>";
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <div id="tab2" class="w3-container tab" style="display:none">
                    <form action="manageuser.php" method="POST">
                        <p>Enter user ID For Change Password!</p>
                        <input type="number" name="id1" style="margin-top:15px;"><br><span><?php echo $id1Err ?></span><br>
                        <input type="submit" value="Confirm" name="submit" style="margin-top:15px;">
                    </form>
                    <div class="table">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>NID</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "SELECT id,username,firstname,lastname,email,nid,type FROM login WHERE type='user'";
                            $result = mysqli_query($conn, $sql);
                            $rowCount = mysqli_num_rows($result);
                            if ($rowCount > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tbody>
                                            <tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['username'] . "</td>
                                            <td>" . $row['firstname'] . "</td>
                                            <td>" . $row['lastname'] . "</td> 
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['nid'] . "</td>
                                            <td>" . $row['type'] . "</td>
                                            </tr>
                                        </tbody>";
                                }
                                echo "</table>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <script>
                function openTab(tab1,tab2) {
                var i;
                var x = document.getElementsByClassName("tab");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                document.getElementById(tab1,tab2).style.display = "block";  
                }
                </script>
            </section>
        </div>
    </body>
</html>