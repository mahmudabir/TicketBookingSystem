<?php
include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$board = $destination  = $choose_type = $train_list = "";
$boardErr = $destinationErr = $numberErr = $choose_typeErr = $train_listErr = "";

$payment = $per_seat_cost = $number = $number = $seat = $chosen_number = $available_seat = $balance = $new_balance = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['board'])) {
        $boardErr = "Please Select a board location.";
    } else {
        $board = $_POST['board'];
    }

    if (empty($_POST['destination'])) {
        $destinationErr = "Please Select board or destination location.";
    } else {
        if ($board == $_POST['destination']) {
            $destinationErr = "Board & destination Location cannot be same.";
        } else {
            $destination = $_POST['destination'];
        }
    }

    if (empty($_POST['choose_type'])) {
        $choose_typeErr = "Please Select the type of train.";
    } else {
        $choose_type = $_POST['choose_type'];
    }

    if (empty($_POST['train_list'])) {
        $train_listErr = "Please Select a destination location.";
    } else {
        $train_list = $_POST['train_list'];
    }

    if (empty($_POST['number'])) {
        $numberErr = "Please Select a number of seat.";
    } else {
    }

    if (!empty($_POST['board']) && !empty($_POST['destination']) && !empty($_POST['number']) && !empty($_POST['choose_type']) && !empty($_POST['train_list'])) {
        $chosen_number = $_POST['number'];
        $sql_seat_check = "SELECT available_seat FROM train_list WHERE id='$train_list' and board = '$board' and destination = '$destination'";
        $seat = mysqli_query($conn, $sql_seat_check);

        while ($row = mysqli_fetch_assoc($seat)) {
            $available_seat = $row['available_seat'];
        }

        if ($available_seat >= $chosen_number) {
            $number = $chosen_number;

            $username = $_SESSION['username'];
            $sql_train_check = "SELECT id, cost from train_list WHERE id='$train_list' and board = '$board' and destination = '$destination'";
            $result = mysqli_query($conn, $sql_train_check);

            while ($row = mysqli_fetch_assoc($result)) {
                //$bIdInDB = $row['id'];
                $per_seat_cost = $row['cost'];
            }
            $payment = $per_seat_cost * $number;

            //checking user balance
            $sql_balance_check = "SELECT balance from login WHERE username='$username'";
            $balance_result = mysqli_query($conn, $sql_balance_check);

            while ($row = mysqli_fetch_assoc($balance_result)) {
                $balance = $row['balance'];
            }

            if ($balance >= $payment) {
                //insert into train history table
                $sql_insert_into_history = "INSERT INTO train_history (username, train_id, seat, payment, status) VALUES ('$username', '$train_list', '$number', '$payment', 'paid');";
                mysqli_query($conn, $sql_insert_into_history);

                $new_balance = $balance - $payment;

                //updating balance after successfull ticket booking
                $sql_update_balance = "UPDATE login SET balance='$new_balance' WHERE username='$username'";
                mysqli_query($conn, $sql_update_balance);


                //updating available seat number
                $new_available_seat = $available_seat - $number;
                $sql_update_available_seat = "UPDATE train_list SET available_seat='$new_available_seat' WHERE id='$train_list'";
                mysqli_query($conn, $sql_update_available_seat);


                $numberErr = "Successfully booked";
                $board = $destination = $choose_type = $train_list = "";
                $number = 0;
            } else {
                $numberErr = "You don't have sufficient balance";
            }
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
    <link rel="stylesheet" href="train.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#board").change(function() {
                var bid = $("#board").val();
                $("#destination").change(function() {
                    var did = $("#destination").val();
                    $("#choose_type").change(function() {
                        var ttype = $("#choose_type").val();
                        $.ajax({
                            url: 'traindata.php',
                            method: 'post',
                            data: {
                                bid: bid,
                                did: did,
                                ttype: ttype
                            }
                        }).done(function(train_list) {
                            console.log(train_list);
                            train_list = JSON.parse(train_list);
                            $('#train_list').empty();
                            train_list.forEach(function(train_list) {
                                $('#train_list').append('<option value="' + train_list.id + '">' + train_list.name + '</option>')
                            })
                        })

                    })

                })
            })
        })

        function board_change() {
            document.getElementById('destination').style.display = 'block';
            document.getElementById('destination_label').style.display = 'block';

            document.getElementById('board').style.display = 'none';
            document.getElementById('board_label').style.display = 'none';
        }

        function destination_change() {
            document.getElementById('number').style.display = 'block';
            document.getElementById('number_label').style.display = 'block';

            document.getElementById('choose_type').style.display = 'block';
            document.getElementById('choose_type_label').style.display = 'block';

            document.getElementById('destination').style.display = 'none';
            document.getElementById('destination_label').style.display = 'none';
        }

        function reset_page() {
            window.location.reload();
        }

        function show_per_seat_cost(str, number, type) {
            var xhttp;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "traincostget.php?q=" + str + "&r=" + number, true);
            xhttp.send();
        }
    </script>
</head>

<body>
    <div class="box">
        <h1>Ticket booking here</h1>
        <form action="train.php" method="post">

            <p id="board_label">Board Location:</p>

            <select name="board" id="board" onchange="board_change()">
                <option selected="" disabled="">Select City</option>
                <?php
                require 'traindata.php';
                $train_list = load_train_board();
                foreach ($train_list as $train_list) {
                    echo "<option id='" . $train_list['board'] . "' value='" . $train_list['board'] . "'>" . $train_list['board'] . "</option>";
                }
                ?>
            </select>

            <p id="destination_label" style="display: none">Destination Location:</p>
            <select name="destination" id="destination" style="display: none" onchange="destination_change()">
                <option selected="" disabled="">Select City</option>
                <?php
                $train_list = load_train_destination();
                foreach ($train_list as $train_list) {
                    echo "<option id='" . $train_list['destination'] . "' value='" . $train_list['destination'] . "'>" . $train_list['destination'] . "</option>";
                }
                ?>
            </select>

            <p id="number_label" style="display: none">Number of Ticket Need</p>
            <select id="number" name="number" style="display: none">
                <option disabled="" selected="">Select</option>
                <option value="1">+1</option>
                <option value="2">+2</option>
                <option value="3">+3</option>
                <option value="4">+4</option>
            </select><br>


            <p id="choose_type_label" style="display: none">Choose Type: </p>
            <select id="choose_type" name="choose_type" style="display: none">
                <option selected="" disabled="">Choose Train Type</option>
                <option id="ac" value="ac">AC</option>
                <option id="nonac" value="nonac">Non Ac</option>
            </select><br>

            <p id="train_list_label">Choose Train</p>
            <select name="train_list" id="train_list" onclick="show_per_seat_cost(this.value, number.value)">
                <option selected="" disabled="">Select Train</option>
            </select>
            <br>

            <div style="color: green" id="txtHint">You will see Per seat cost & Total cost here.</div><br>


            <input type="button" Value="Reset" onclick="reset_page()">
            <input type="submit" value="Confirm" id="submit">
            <p style="color: yellow"><?php echo $numberErr; ?></p><br>
            <p style="color: yellow"><?php echo $destinationErr; ?></p>
            <p style="color: yellow"><?php echo $choose_typeErr; ?></p>
        </form>
    </div>
</body>

</html>