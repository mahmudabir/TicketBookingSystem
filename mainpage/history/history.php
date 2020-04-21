<?php
    include "../mainpage/common.inc.php";
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
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Bus ID</th>
                        <th>Seat No</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>cddf</td>
                        <td>sdsds</td>
                        <td>sdsds</td>
                        <td>dsds</td>
                        <td>sdsds</td>
                    </tr>
                    <tr>
                        <td>cddf</td>
                        <td>sdsds</td>
                        <td>sdsds</td>
                        <td>dsds</td>
                        <td>sdsds</td>
                    </tr>
                    <tr>
                        <td>cddf</td>
                        <td>sdsds</td>
                        <td>sdsds</td>
                        <td>dsds</td>
                        <td>sdsds</td>
                    </tr>
                    <tr>
                        <td>cddf</td>
                        <td>sdsds</td>
                        <td>sdsds</td>
                        <td>dsds</td>
                        <td>sdsds</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>