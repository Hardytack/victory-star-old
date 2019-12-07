<?php

require_once("config.php");
require_once("header2.php");

if(!isset($_GET["setName"])) {
    echo "No format selected";
}

else {
    $setName = $_GET["setName"];
    $html = "<table class='table table-striped table-bordered table-hover                       searchResult'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Card Name</th>
                        <th>Card Number</th>
                    </tr>
                </thead>";
    
    $query = $con->prepare("SELECT * FROM cards WHERE setName = :setName ORDER BY cardNumber");
    $query->bindParam(":setName", $setName);
    $query->execute();
    
    
    while($returnCards = $query->fetch(PDO::FETCH_ASSOC)) {
    $html .= "<tr>
                <td><a href='card.php?cardCode=".$returnCards["codeName"]."'>".$returnCards["cardName"]."</a></td>
                <td>".$returnCards['cardNumber']."</td>
            </tr>";
    }
    
    $html .= "</table>";
    
    
    /*$html = "<ul>
                <li>Sun/Moon</li>
                <li>Guardians Rising</li>
                <li>Crimson Invasion</li>
                <li>Ultra Prism</li>
            </ul>";*/
    echo $html;
}

?>