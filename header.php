<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "utf-8">
<link href="CSS/header.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Cinzel:wght@800&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<meta name="dscription" content="Common Header for all">
<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <div class="wrapper">
    <div class="image"><img src ="Images/phoenix.png" width = "100px" height="100px"></div>
    <div class="Name"><span>Login</span> System</div>
    <div class="item"><a href="Home.php" class="link">Home</a></div>
    <div class="item"><a href="#" class="link">Contact Us</a></div>
    <div class="item"><a href="#" class="link">About Us</a></div>
    <?php
    if (isset($_SESSION["userid"])){
        echo "<div class='item'><a href='Profile.php' class='link'>Profile Page</a></div>";
        echo "<div class='item'><a href='includes/LogOut.inc.php' class='link'>LogOut</a></div>";
    }
    else{
        echo "<div class='item'><a href='Login.php' class='link'>Login</a></div>";
        echo "<div class='item'><a href='SignUp.php' class='link'>Sign Up</a></div>";
    }
    ?>
    </div>
</body>

</html>