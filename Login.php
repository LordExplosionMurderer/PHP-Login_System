<?php 
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "utf-8">
<meta name="dscription" content="SignUpPage">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style> form{padding-top:150px;padding-left:20px;}</style>
</head>
<body>
    <form id="form" action="includes/Login.inc.php" method="post"><!-- This file cannot be viewed by the user but this will have a basic php script that'll allow the user to run their account -->
        <label for="user_name">User Name</label></br><!--Well this form right here will pass on the data to the url but the post method wont show it on the url instead it will pass on the data to inc file -->
        <input type="text" name="UserName" maxlength="50" id="user_name" placeholder="User Name/Email.. "/></br>
        <label for="pass1">Password</label></br>
        <input type="password" name="Password1" maxlength="50" id="pass1" placeholder="Password.."/></br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>
<?php
$errorType = $_GET["error"];
if($errorType == "emptyinput"){ echo("One of the inputs have been left empty"); }
if($errorType == "WrongUserName"){ echo("No such user name exists in the data base"); }
if($errorType == "WrongPassword"){ echo("The passwords dont match"); }
?>