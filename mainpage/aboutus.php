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
        <link rel="stylesheet" href="aboutus.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <script>
            function validate(){
                var input_name=document.getElementById("name");
                if(input_name.value == ""){
                    alert("Please input your Name");
                    return false;
                }
                var input_email=document.getElementById("email");
                if(input_email.value == ""){
                    alert("Please input your Email");
                    return false;
                }
                var input_phone=document.getElementById("phone");
                if(input_phone.value == ""){
                    alert("Please input your Phone");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="contact_section">
            <h1>
                Contact Us
            </h1>
            <div class="border"></div>
            <form class="contact_form" action="aboutus.html" method="POST" onsubmit="return validate();">
                <input type="text" class="contact_form_text" placeholder="Your Name" id="name">
                <input type="email" class="contact_form_text" placeholder="Your Email" id="email">
                <input type="text" class="contact_form_text" placeholder="Your Phone" id="phone">
                <textarea class="contact_form_text" placeholder="Your Message"></textarea>
                <input type="submit" class="contact_form_btn" value="Send">
            </form>
        </div>
    </body>
</html>