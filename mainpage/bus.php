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
        <script>
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
        </script>
    </head>
    <body>
        <div class="box">
            <h1>Ticket booking here</h1>
            <form action="bus.php" method="post" onsubmit="return validate();">
                <p>Enter City</p>
                <input type="text" name="from" placeholder="Enter city" id="from"><br>
                <p>TO</p>
                <input type="text" name="to" placeholder="Enter City" id="to"><br>
                <p>Date of Journey</p>
                <input type="date" name="date" placeholder="Pick a date" id="date"><br>
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
                <select id="bus">
                <option value="void" disabled>Choose one</option>
                    <option value="Hanif">Hanif</option>
                    <option value="Green_Line">Green Line</option>
                    <option value="Soudia">Soudia</option>
                    <option value="Ena">ENA</option>

                </select><br>
                <input type="reset">
                <input type="submit" value="Confirm">
            </form>
        </div>
    </body>
</html>