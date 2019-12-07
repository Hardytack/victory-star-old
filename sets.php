<?php

require_once("header2.php");

if(!isset($_GET["format"])) {
    $html = "<ul>";
    
    $query = $con->prepare("SELECT * FROM sets ORDER BY length(setNumber), setNumber");
    $query->execute();
    
    
    while($returnSets = $query->fetch(PDO::FETCH_ASSOC)) {
    $html .= "<li><a href='cardlists.php?setName=".$returnSets["webName"]."'>"
        .$returnSets["SetName"]."</a></li>";
    }
    
    $html .= "</ul>";
    
    echo $html;
}

else {
    $format = $_GET["format"];
    $html = "<ul>";
    
    $query = $con->prepare("SELECT * FROM sets WHERE Format = :format ORDER BY length(setNumber), setNumber");
    $query->bindParam(":format", $format);
    $query->execute();
    
    
    while($returnSets = $query->fetch(PDO::FETCH_ASSOC)) {
    $html .= "<li><a href='cardlists.php?setName=".$returnSets["webName"]."'>"
        .$returnSets["SetName"]."</a></li>";
    }
    
    $html .= "</ul>";
    
    echo $html;
}

?>
