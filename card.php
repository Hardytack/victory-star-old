<?php

require_once("config.php");
require_once("header2.php");
require_once("includes/classes/favoriteCard.php");



    if(!isset($_GET["cardCode"])) {
        echo "No Card Available";
    }

else {
    
    
    $codeName = $_GET["cardCode"];
    
    if (isset($_SESSION["TCGLoggedIn"])) {
            $query = $con->prepare("SELECT * FROM users WHERE username = :un");
            $query->bindParam(":un", $_SESSION["TCGLoggedIn"]);
            $query->execute();
            $favCard = $query->fetch(PDO::FETCH_ASSOC);
            if  ($favCard["favoriteCard"] == $codeName) {
                $classType = "fas fa-heart heartIcon";
            } else {
                $classType = "far fa-heart heartIcon";
            }
        $favoriteButton = new favoriteCard($con, $_GET["cardCode"], $classType, $_SESSION["TCGLoggedIn"]);
     } 
    
    
    $query = $con->prepare("SELECT * FROM cards WHERE codeName = :codeName");
    $query->bindParam(":codeName", $codeName);
    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $name = $result["codeName"];
    
    if (isset($_SESSION["TCGLoggedIn"])){
        $quantity = $con->prepare("SELECT * FROM collection WHERE codeName = :cn AND username = :un");
        $quantity->bindParam(":cn", $result["codeName"]);
        $quantity->bindParam(":un", $_SESSION["TCGLoggedIn"]);
        $quantity->execute();
    }
    
}

?>


<div id="cardPageContainer" class="clearfix">


<div id="spotlightContainer" class="container" >
    <img id="spotlightImage" src='<?php 
        $html = "";
                                  
        $quantity = $con->prepare("SELECT * FROM collection WHERE codeName = :cn");
        $quantity->bindParam(":cn", $result["codeName"]);
        $quantity->execute();
        $owned = "";
                                               
        if($quantity->rowCount() > 0) {
            $html .= $result["picturePath"]."' class='card'";
        } else {
            $html .= $result["picturePath"]."' class='card notOwned'";
            $owned = 0;
        }
        echo $html;
                                               
    ?>' onmouseover='hoverEffect(this)'>
</div>
    
<div id="cardPageInfo">
    
    <h3 id="cardNameHeadline"><?php echo $result["cardName"];?><?php 
        
        if(isset($_SESSION["TCGLoggedIn"])) {
            echo $favoriteButton->createFavoriteButton($classType); 
        } 
        
        ?></h3><hr>
    <h5>Set: <?php echo $result["setName"]; ?>, Card Number: <?php echo $result["cardNumber"]; ?></h5>
    <div id="quantityStats">
        
        <?php
        $query = $con->prepare("SELECT * FROM collection WHERE codeName = :cn");
        $query->bindParam(":cn", $codeName);
        $query->execute();
        $communityTotal = $query->rowCount();
    
        $query = $con->prepare("SELECT SUM(quantity) FROM collection WHERE codeName = :cn");
        $query->bindParam(":cn", $codeName);
        $query->execute();
        $totalResult = $query->fetch(PDO::FETCH_ASSOC); 
    
        
        if (!isset($totalResult["SUM(quantity)"])) {
            $totalResult = 0;
        } else {
           $totalResult = $totalResult["SUM(quantity)"];
        }
        
        if (isset($_SESSION["TCGLoggedIn"])) {
            $query = $con->prepare("SELECT * FROM collection WHERE codeName = :cn AND username = :un");
            $query->bindParam(":cn", $result["codeName"]);
            $query->bindParam(":un", $_SESSION["TCGLoggedIn"]);
            $query->execute();
            $userOwned = $query->fetch(PDO::FETCH_ASSOC);
            
            if (!isset($userOwned["quantity"])) {
                $userOwned = 0;
            } else {
               $userOwned = $userOwned["quantity"];
            }
            
        } 
    
    
    ?>
        
        <table class="table table-striped table-bordered table-hover cardTable">
            <thead>
                <tr class="thead-dark">
                    <th colspan="2" style="text-align: center">Stats</th>
                </tr>
            </thead>
            <?php if(isset($_SESSION["TCGLoggedIn"])) {
                    echo "<tr>
                            <td class='tableTitle'>You Own:</td>
                            <td>$userOwned</td>
                        </tr>";
                    } ?>
            <tr>
                <td class='tableTitle'>Community Owned:</td>
                <td><?php echo $totalResult; ?></td>
            </tr>
            <tr>
                <td class='tableTitle'>Unique Users:</td>
                <td><?php echo $communityTotal; ?></td>
            </tr>
        </table>
    
    </div>
    <div id="updateTotalForm">
        <form action="updateCardCount.php" method="POST">
        <?php

        if(!isset($_SESSION["TCGLoggedIn"])) {
            echo "<a href='signin.php'>Sign In</a> to track how many you own!";
        } else {
            $count = $quantity->fetch(PDO::FETCH_ASSOC);
            echo "<input type='hidden' value='".$name."' name='codeName'>";
            echo "<input type='submit' value='Update Your Total' name='updateTotalButton' id='updateTotalButton'>";
        }


        ?>


        </form>
    </div>
</div>
</div>
<div id="otherCards">
    <p>Coming Soon...</p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="hover.js"></script>
<script src="main.js"></script>