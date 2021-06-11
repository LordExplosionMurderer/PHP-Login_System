<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;//no need to define like wtf??
    if (empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }
    else{$result=false;}
    return $result;
}
function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){//to check whether certain symbols are there in the string or not
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){//just to check whther email is in the correct format or not
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUID=? OR userEmail=?;";//here * means all so select all from users table where userUID is something and ? is a placeholder
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtfailedfor1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users(userName, userEmail, userUID, userPwd) VALUES(?,?,?,?);";//here * means all so select all from users table where userUID is something and ? is a placeholder
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtfailedfor2");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss",$name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    header("location: ../SignUp.php?error=none");
        exit();

}

function emptyInputLogin ($username, $pwd){
    $result;//no need to define like wtf??
    if (empty($username)||empty($pwd)){
        $result = true;
    }
    else{$result=false;}
    return $result;
}

function LoginUser($conn,$username, $pwd){
    $UidExists = uidExists($conn, $username, $username);
    if($UidExists == false){
        header("location: ../Login.php?error=WrongUserName");
        exit();
    }

    $GivenHashedPwd = $UidExists["userPwd"];
    $checkPwd = password_verify($pwd, $GivenHashedPwd);
    if ($checkPwd == false){
        header("location: ../Login.php?error=WrongPassword");
        exit();
    }
    else if ($checkPwd == true){
        session_start();
        $_SESSION["userid"] = $UidExists["usersID"];
        $_SESSION["useruid"] = $UidExists["userUID"];
        header("location: ../Index.php");
        exit();
    }

}

