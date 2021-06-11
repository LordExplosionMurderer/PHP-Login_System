<?php //well giving a closing tag and then leaving blank spaces after it creates some error kinda things
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "login_system";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
if(!$conn){die("Connection failed : ".mysqli_connect_error());}