<?php
include "../mainpage/common.inc.php";
include "../db/db_connect.inc.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

$board = $destination = "";
$boardErr = $destinationErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                                $('#bus_list').append('<option>' + bus_list.name + '</option>')
                            })
                        })

                    })

                })
            })
        })

        function destination_enable() {
            document.getElementById('destination').style.display = 'block';
        }

        function reload_page() {
            window.location.reload(true);
        }

        function choose_type_enable() {
            document.getElementById('choose_type').style.display = 'block';
            document.getElementById('number').style.display = 'block';
            document.getElementById('number_label').style.display = 'block';
        }

        /*function validate() {
            var input_from = document.getElementById("board");
            if (input_from.value == "") {
                alert("Please Enter your Board Location");
                return false;
            }

            var input_to = document.getElementById("destination");
            if (input_to.value == "") {
                alert("Please Enter your Destination city");
                return false;
            }

            var input_date = document.getElementById("date");
            if (input_date.value == "") {
                alert("Please Pick Date of Journey");
                return false;
            }

            var input_number = document.getElementById("number");
            if (input_number.value == "") {
                alert("Please Select how many Ticket you need!");
                return false;
            }

            var input_number = document.getElementById("choose_type");
            if (input_number.value == "") {
                alert("Please Select type of bus you need!");
                return false;
            }


            var input_bus = document.getElementById("bus");
            if (input_bus.value == "") {
                alert("Please Choose a Bus!");
                return false;
            }
        }*/
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
            <select id="number" style="display: none">
                <option disabled>Select</option>
                <option value="1">+1</option>
                <option value="2">+2</option>
                <option value="3">+3</option>
                <option value="4">+4</option>

            </select><br>


            <select id="choose_type" style="display: none">
                <option selected="" disabled="">Choose Bus Type</option>
                <option id="ac" value="ac">AC</option>
                <option id="nonac" value="nonac">Non Ac</option>

            </select><br>

            <p>Choose Bus</p>
            <select name="bus_list" id="bus_list">

            </select>
            <br>
            <input type="reset" onclick="reset_page()">
            <input type="submit" value="Confirm">
        </form>
    </div>
</body>

</html>