<?php
    include "../adminpage/common.inc.php";

    /*session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../login/login.php");
}*/

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="train.css">
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
                var input_bus=document.getElementById("train");
                if(input_bus.value == ""){
                    alert("Please Choose a train!");
                    return false;
                }
            } 
        </script>
    </head>
    <body>
        <div class="box">
            <h1>Ticket booking here</h1>
            <form action="train.php" method="post" onsubmit="return validate();">
                <p>Enter City</p>
                <select name="" id="from">
                    <option disabled>Enter city</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                </select>
                <p>TO</p>
                <select name="" id="to">
                    <option disabled>Enter city</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Dhaka">Dhaka</option>
                </select>
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
                <p>Choose Buggy Type</p>
                <input type="radio" id="Ac" name="bus_type" value="Ac">
                <label for="Ac">AC</label><br>
                <input type="radio" id="NonAc" name="bus_type" value="NonAc">
                <label for="Ac">NON AC</label><br>
                <p>Choose Train</p>
                <select id="train">
                <option value="void" disabled>Choose one</option>
                    <option value="Sonar_Bangla">Sonar Bangla Express</option>
                    <option value="Suborno">Suborno Express</option>

                </select><br>
                <input type="reset">
                <input type="submit" value="Confirm">
            </form>
        </div>
    </body>
</html>