<?php 
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "utf-8">
<meta name="dscription" content="HomePage">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
p.bosyline{padding-top:150px;
margin:0;}
</style>
</head>
<body>
    <p class="bosyline">This is the Profile page</p>
    <?php
    echo "Welcome ".$_SESSION["useruid"];
    ?>
</body>
</html>