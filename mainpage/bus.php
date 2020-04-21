<?php
include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$board = $destination  = $choose_type = $bus_list = "";
$boardErr = $destinationErr = $numberErr = $choose_typeErr = $bus_listErr = "";

$payment = $per_seat_cost = $number = $number = $seat = $chosen_number = $available_seat = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //$payment = $per_seat_cost = $number = $number = $seat = $chosen_number = 0;

    if (empty($_POST['board'])) {
        $boardErr = "Please Select a board location.";
    } else {
        $board = $_POST['board'];
    }

    if (empty($_POST['destination'])) {
        $destinationErr = "Please Select a destination location.";
    } else {
        $destination = $_POST['destination'];
    }

    if (empty($_POST['choose_type'])) {
        $choose_typeErr = "Please Select the type of bus.";
    } else {
        $choose_type = $_POST['choose_type'];
    }

    if (empty($_POST['bus_list'])) {
        $bus_listErr = "Please Select a destination location.";
    } else {
        $bus_list = $_POST['bus_list'];
    }

    if (empty($_POST['number'])) {
        $numberErr = "Please Select a number of seat.";
    } else {
    }

    if (!empty($_POST['board']) && !empty($_POST['destination']) && !empty($_POST['number']) && !empty($_POST['choose_type']) && !empty($_POST['bus_list'])) {
        $chosen_number = $_POST['number'];
        $sql_seat_check = "SELECT available_seat FROM bus_list WHERE id='$bus_list' and board = '$board' and destination = '$destination'";
        $seat = mysqli_query($conn, $sql_seat_check);

        while ($row = mysqli_fetch_assoc($seat)) {
            $available_seat = $row['available_seat'];
        }

        if ($available_seat >= $chosen_number) {
            $number = $chosen_number;

            $username = $_SESSION['username'];
            $sql_bus_check = "SELECT id, cost from bus_list WHERE id='$bus_list' and board = '$board' and destination = '$destination'";
            $result = mysqli_query($conn, $sql_bus_check);

            while ($row = mysqli_fetch_assoc($result)) {
                //$bIdInDB = $row['id'];
                $per_seat_cost = $row['cost'];
            }
            $payment = $per_seat_cost * $number;
            $sql_insert_into_history = "INSERT INTO bus_history (username, bus_id, seat, payment, status) VALUES ('$username', '$bus_list', '$number', '$payment', 'paid');";
            mysqli_query($conn, $sql_insert_into_history);
            $numberErr = "Successfully booked";


            $new_available_seat = $available_seat - $number;
            $sql_update_available_seat = "UPDATE bus_list SET available_seat='$new_available_seat' WHERE id='$bus_list'";
            mysqli_query($conn, $sql_update_available_seat);

            
        } else {
            $numberErr = "The number of seat you want is not available";
        }
    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="bus.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#board").change(function() {
                var bid = $("#board").val();
                $("#destination").change(function() {
                    var did = $("#destination").val();
                    $("#choose_type").change(function() {
                        var btype = $("#choose_type").val();
                        $.ajax({
                            url: 'busdata.php',
                            method: 'post',
                            data: {
                                bid: bid,
                                did: did,
                                btype: btype
                            }
                        }).done(function(bus_list) {
                            console.log(bus_list);
                            bus_list = JSON.parse(bus_list);
                            $('#bus_list').empty();
                            bus_list.forEach(function(bus_list) {
                                $('#bus_list').append('<option value="' + bus_list.id + '">' + bus_list.name + '</option>')
                            })
                        })

                    })

                })
            })
        })

        function destination_enable() {
            document.getElementById('destination').style.display = 'block';
        }

        function reset_page() {
            window.location.reload(true);
        }

        function choose_type_enable() {
            document.getElementById('choose_type').style.display = 'block';
            document.getElementById('number').style.display = 'block';
            document.getElementById('number_label').style.display = 'block';
        }

        function show_cost() {
            
            
            
        }
    </script>

</head>

<body>
    <div class="box">
        <h1>Ticket booking here</h1>
        <form action="bus.php" method="post">

            <p>Board Location:</p>

            <select name="board" id="board" onchange="destination_enable()">
                <option selected="" disabled="">Select City</option>
                <?php
                require 'busdata.php';
                $bus_list = load_bus_board();
                foreach ($bus_list as $bus_list) {
                    echo "<option id='" . $bus_list['board'] . "' value='" . $bus_list['board'] . "'>" . $bus_list['board'] . "</option>";
                }
                ?>
            </select>

            <p id="destination_label" style="display: none">Destination Location:</p>
            <select name="destination" id="destination" style="display: none" onchange="choose_type_enable()">
                <option selected="" disabled="">Select City</option>
                <?php

                $bus_list = load_bus_destination();
                foreach ($bus_list as $bus_list) {
                    echo "<option id='" . $bus_list['destination'] . "' value='" . $bus_list['destination'] . "'>" . $bus_list['destination'] . "</option>";
                }
                ?>
            </select>

            <p id="number_label" style="display: none">Number of Ticket Need</p>
            <select id="number" name="number" style="display: none">
                <option disabled="">Select</option>
                <option value="1">+1</option>
                <option value="2">+2</option>
                <option value="3">+3</option>
                <option value="4">+4</option>

            </select><br>


            <select id="choose_type" name="choose_type" style="display: none">
                <option selected="" disabled="">Choose Bus Type</option>
                <option id="ac" value="ac">AC</option>
                <option id="nonac" value="nonac">Non Ac</option>

            </select><br>

            <p>Choose Bus</p>
            <select name="bus_list" id="bus_list" >

            </select>
            <br>
            <input type="reset" onclick="reset_page()">
            <input type="submit" value="Confirm" id="submit" onclick="show_cost()">
            <?php echo $numberErr; ?>
            

        </form>
    </div>
</body>

</html>