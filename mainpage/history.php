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
            <input checked="chechked" id="tab1" type="radio" name="history">
            <input id="tab2" type="radio" name="history">
            <input id="tab3" type="radio" name="history">
            <nav>
                <ul>
                    <li class="tab1"><label for="tab1">Bus History</label></li>
                    <li class="tab2"><label for="tab2">Train History</label></li>
                    <li class="tab3"><label for="tab3">Launch History</label></li>
                </ul>
            </nav>
            <section>
                <div class=tab1>
                    
                    <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>BUS Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <?php
                        $username=$_SESSION['username'];
                        $sql = "SELECT * from bus_history where username='$username'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);

                        if($rowCount > 0){
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tbody><tr><td>".$row['id']."</td><td>".$row['username'].
                                "</td><td>".$row['bus_id']."</td><td>".$row['seat']."</td><td>".
                                $row['date']."</td><td>".$row['payment']."</td><td>".$row['status'].
                                "</td></tr></tbody>";
                            }
                            echo "</table>";
                        }
                    ?>
                    </table>
                </div>
                <div class="tab2">
                       
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type
                    </p>
                </div>
                <div class="tab3">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type
                         specimen book. It has survived not only five centuries, but also the leap into 
                         electronic typesetting, remaining essentially unchanged. It was popularised in 
                         the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                         and more recently with desktop publishing software like Aldus PageMaker including 
                         versions of Lorem Ipsum
                    </p>
                </div>
            </section>





            
        </div>
    </body>
</html>