<?php 
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "utf-8">
<meta name="dscription" content="SignUpPage">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    form{padding-top:150px;
    padding-left:50px;}
</style>
</head>
<body>
    <form id="form" action="includes/SignUp.inc.php" method="post">
        <label for="name">Full Name</label></br>
        <input type="text" name="name" maxlength="50" id="name"/></br>
        <label for="email">Email</label></br>
        <input type="text" name="email" maxlength="50" id="email"/></br>
        <label for="user_name">User Name</label></br>
        <input type="text" name="uid" maxlength="50" id="user_name"/></br>
        <label for="pass1">Type your Password</label></br>
        <input type="password" name="pwd" maxlength="50" id="pass1"/></br>
        <label for="pass2">Confirm Password</label></br>
        <input type="password" name="pwdRepeat" maxlength="50" id="pass2"/></br></br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</body>
</html>
<?php 
$errorType = $_GET["error"];
if($errorType == "emptyinput"){ echo("One of the inputs have been left empty"); }

if($errorType == "invaliduidt"){ echo("Your username does not match to the required format"); }

if($errorType == "invalidemail"){ echo("please insert a valid email ID"); }
if($errorType == "passwordsdontmatch"){ echo("passwords dont match"); }
if($errorType == "usernametaken"){ echo("username already taken"); }
if($errorType == "none"){ echo("Congratulations you are signed up"); }
?>