<?php
require_once("../config.php"); 

if(isset($_POST["format"])) {

    $query = $con->prepare("SELECT * FROM sets WHERE format = :format ORDER BY length(setNumber), setNumber");
    $query->bindParam(":format", $format);
    $format = $_POST["format"];
    if($query->execute()) {
        $list = "";
        while($returnSets = $query->fetch(PDO::FETCH_ASSOC)) {
            $list .= "<option>".$returnSets["SetName"]."</option>";
        }
        echo $list;
    }
}
else {
    echo "<option>false</option>";
}

    



?>