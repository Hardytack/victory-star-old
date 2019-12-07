<link rel="stylesheet" type="text/css" href="style.css">

<?php

require_once("config.php");

$getCards = $con->prepare("SELECT * FROM cards");
$getCards->execute();


$html = "";

while($returnCards = $getCards->fetch(PDO::FETCH_ASSOC)) {
    $quantity = $con->prepare("SELECT * FROM collection WHERE codeName = :codeName");
    $quantity->bindParam(":codeName", $returnCards["codeName"]);
    $quantity->execute();
    $quantityCount = $quantity->fetch(PDO::FETCH_ASSOC);
    if($quantity->rowCount() > 0) {
        $quantityCounter = $quantityCount["quantity"];
        $html .= "<div class='container' id='container'><img id='card' class='card' src='".$returnCards["picturePath"]."' onmouseover='hoverEffect(this)'><figcaption>Number Owned:".$quantityCounter."</figcaption></div>";
    } else {
        $quantityCounter = 0;
        $html .= "<div class='container' id='container'><img id='card' class='notOwned card' src='".$returnCards["picturePath"]."' onmouseover='hoverEffect(this)'><figcaption>Number Owned:".$quantityCounter."</figcaption></div>";
    }
}

echo $html;

    
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="hover.js"></script>