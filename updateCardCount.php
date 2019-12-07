<?php

require_once("config.php");
require_once("header.php");

if(!isset($_POST["updateTotalButton"])) {
    echo "No card submited for update";
}

else {
    $query = $con->prepare("SELECT * FROM cards WHERE codeName = :cn");
    $query->bindParam(":cn", $_POST["codeName"]);
    $query->execute();
    
    $card = $query->fetch(PDO::FETCH_ASSOC);
    $codeName = $card["codeName"];
    
    echo "Currently updating ".$card["cardName"]. " to a new total!";
}


?>

<form action="updateCards.php" method="POST">
    <label for="newQuantity">How many do you own?</label>
    <input type="number" name="newQuantity" id="newQuantity"><br>
    
    <label for="newLocation">Where do you keep it?</label>
    <input type="text" name="newLocation" id="newLocation"><br>
    <input type="hidden" name="codeName" value="<?php echo $codeName; ?>">
    
    
    <input type="submit" name="newTotalsButton">

</form>