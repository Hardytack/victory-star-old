<?php


//Waits for loading to finish
ob_start();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//sets default timezone
date_default_timezone_set("America/New_York");

try {
    $con = new PDO("mysql:dbname=hardytac_VictoryStar;host=localhost", "hardytac_Hardy", "C@terpi3");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}


?>