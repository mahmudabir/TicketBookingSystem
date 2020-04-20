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
    <title></title>
    <link rel="stylesheet" href="bus.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#board").change(function() {
                var bid = $("#board").val();
                
                $.ajax({url: 'busdata.php',method: 'post',data: 'bid=' + bid}).done(function(bus_list) {console.log(bus_list);})
            })
        })
    </script>

    <!--<script>
            function validate(){
                var input_from=document.getElementById("from");
                if(input_from.value == ""){
                    alert("Please Enter your city");
                    return false;
                }
                var input_to=document.getElementById("to");
                if(input_to.value == ""){
                    alert("Please Enter your Destination city");
                    return false;
                }
                var input_date=document.getElementById("date");
                if(input_date.value == ""){
                    alert("Please Pick Date of Journey");
                    return false;
                }
                var input_number=document.getElementById("number");
                if(input_number.value == ""){
                    alert("Please Select how many Ticket you need!");
                    return false;
                }
                var input_bus=document.getElementById("bus");
                if(input_bus.value == ""){
                    alert("Please Choose a Bus!");
                    return false;
                }
            } 
        </script>-->

</head>

<body>
    <div class="box">
        <h1>Ticket booking here</h1>
        <form action="bus.php" method="post">

            <p>Board Location:</p>

            <select name="board" id="board">
                <option selected="" disabled="">Select City</option>
                <?php
                require 'busdata.php';
                $bus_list = load_bus_list();
                foreach ($bus_list as $bus_list) {
                    echo "<option id='" . $bus_list['board'] . "' value='" . $bus_list['board'] . "'>" . $bus_list['board'] . "</option>";
                }
                ?>
            </select>

            <p>Destination Location:</p>
            <select name="destination" id="destination">
                <option selected="" disabled="">Select City</option>
                <?php

                $bus_list = load_bus_list();
                foreach ($bus_list as $bus_list) {
                    echo "<option id='" . $bus_list['id'] . "' value='" . $bus_list['id'] . "'>" . $bus_list['destination'] . "</option>";
                }
                ?>
            </select>

            <p>Number of Ticket Need</p>
            <select id="number">
                <option disabled>Select</option>
                <option value="1">+1</option>
                <option value="2">+2</option>
                <option value="3">+3</option>
                <option value="4">+4</option>

            </select><br>
            <p>Choose Bus Type</p>
            <input type="radio" id="Ac" name="bus_type" value="Ac">
            <label for="Ac">AC</label><br>
            <input type="radio" id="NonAc" name="bus_type" value="NonAc">
            <label for="Ac">NON AC</label><br>

            <p>Choose Bus</p>
            <select name="bus_list" id="bus_list">

            </select>
            <br>
            <input type="reset">
            <input type="submit" value="Confirm">
        </form>
    </div>
</body>

</html>