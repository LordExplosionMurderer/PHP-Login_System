<?php
if(isset($_POST["submit"])) 
{
    $username = $_POST["UserName"];
    $pwd = $_POST["Password1"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    
    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../Login.php?error=emptyinput");
        exit();
    };
    LoginUser($conn,$username, $pwd);
}
else{
    header("location: ../Login.php");
    exit();
};