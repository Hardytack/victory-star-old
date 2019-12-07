<?php 

require_once("header2.php");

if(!isset($_GET["name"])) {
    echo "No search field entered";
}

else {
    $query = $con->prepare("SELECT * FROM cards WHERE cardName LIKE :sn");
    $sn = "%".$_GET["name"]."%";
    $query->bindParam(":sn", $sn);
    $query->execute();
    
    $html = "";
    
    while($searchReturn = $query->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<a href='card.php?cardCode=".$searchReturn["codeName"]."'><img class='container' src='".$searchReturn["picturePath"]."'></a>";
    }
    
    $html .= "</ul>";
    
    echo $html;
}