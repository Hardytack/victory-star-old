<?php 

require_once("config.php");

if (isset($_POST["newTotalsButton"])) {
    $username = $_SESSION["TCGLoggedIn"];
    $codeName = $_POST["codeName"];
    $quantity = $_POST["newQuantity"];
    $location = $_POST["newLocation"];
    
    if ($_POST["newQuantity"] == 0) {
        $query = $con->prepare("DELETE FROM collection WHERE codeName = :cn AND username = :un");
        $query->bindParam(":cn", $codeName);
        $query->bindParam(":un", $username);
        
        if($query->execute()) {
            echo $_POST["codeName"];
        }
    } else {
        $query = $con->prepare("SELECT * FROM collection WHERE codeName = :cn AND username = :un");
        $query->bindParam(":cn", $codeName);
        $query->bindParam(":un", $username);
        $query->execute();
        
        if($query->rowCount() == 0) {
            $query = $con->prepare("INSERT INTO collection(username, codeName, quantity, location) VALUES(:un, :cn, :qt, :loc)");
            $query->bindParam(":cn", $codeName);
            $query->bindParam(":un", $username);
            $query->bindParam(":qt", $quantity);
            $query->bindParam(":loc", $location);
            if($query->execute()) {
                echo "Added Successfully!";
            }
        } else {
            $query = $con->prepare("UPDATE collection SET quantity = :qt, location = :loc WHERE username = :un AND codeName = :cn");
            $query->bindParam(":cn", $codeName);
            $query->bindParam(":un", $username);
            $query->bindParam(":qt", $quantity);
            $query->bindParam(":loc", $location);
            if($query->execute()) {
                echo "Updated Successfully!";
            }
        }
    }
}

?>

<a href="index.php">Go back to Home</a>