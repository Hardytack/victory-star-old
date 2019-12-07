<?php

require_once("../config.php"); 

$query = $con->prepare("SELECT * FROM users WHERE username = :un");
$query->bindParam(":un", $_POST["username"]);
$query->execute();

$userData = $query->fetch(PDO::FETCH_ASSOC);

if($userData["favoriteCard"] == $_POST["codeName"]) {
    $query = $con->prepare("UPDATE users SET favoriteCard = 'Not Set' WHERE username = :un");
    $query->bindParam(":un", $_POST["username"]);
    if($query->execute()) {
        echo true;
    }
    else {
        echo "Update failed";
    }
} else {
    $query = $con->prepare("UPDATE users SET favoriteCard = :fc WHERE username = :un");
    $query->bindParam(":un", $_POST["username"]);
    $query->bindParam(":fc", $_POST["codeName"]);
    if($query->execute()) {
        echo false;
    }
    else {
        echo "Update failed";
    }
}

?>