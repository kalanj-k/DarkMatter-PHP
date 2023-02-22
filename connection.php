<?php
    $DBName = "store1";
    $serverName = "localhost";
    $user = "root";
    $pass = "";

    $con = new PDO("mysql:host=$serverName;dbname=$DBName;", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>
