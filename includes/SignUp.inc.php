<?php
if(isset($_POST["submit"])) //to check if the user has come in the right way otherwise they can just type the url in the address bar and come here
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';//ig they are trying to include(require) this here but nowhere else in the remaing site

    //to check whether the user has left anything empty
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../SignUp.php?error=emptyinput");//the header() function sends a raw header info to be sent to the browser before any info is shown
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../SignUp.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../SignUp.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../SignUp.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $username, $email) !== false){
        header("location: ../SignUp.php?error=usernametaken");
        exit();
    }
    createUser($conn, $name, $email, $username, $pwd);
}
else{
    header("location: ../SignUp.php");//all I know about this function is that it redirects
    exit();
} 