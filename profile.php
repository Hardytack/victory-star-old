<?php

require_once("header.php");

if(!isset($_GET["username"])) {
    echo "No user available";
}

$query = $con->prepare("SELECT * FROM users WHERE username = :un");
$query->bindParam(":un", $_GET["username"]);
$query->execute();

$userInfo = $query->fetch(PDO::FETCH_ASSOC);
$userPic = $userInfo["profilePic"];
if ($userInfo["favoriteCard"] == "Not Set") {
    $userFav = "default";
} else {
    $userFav = $userInfo["favoriteCard"];
}

$query = $con->prepare("SELECT * FROM collection WHERE username = :un");
$query->bindParam(":un", $_GET["username"]);
$query->execute();

$cardInfo = $query->rowCount();

$maxquery = $con->prepare("SELECT * from collection WHERE username = :un AND quantity = (SELECT MAX(quantity) FROM collection)");
$maxquery->bindParam(":un", $_GET["username"]);
$maxquery->execute();

if ($maxquery->rowCount() == 0) {
    $maxCard = "default";
}
else {
    $maxCard = $maxquery->fetch(PDO::FETCH_ASSOC);
    $maxCard = $maxCard["codeName"];
}





?>

<div id="profileBody">
    <div id="profileHeader" class="clearfix">
        <div id="profilePicBig" class="clearfix">
            <img src="<?php echo $userPic; ?>">
        </div>
        <div id="profileHeaderText">
            <h1><?php echo $_GET["username"]; ?></h1>
            <h3>Unique Cards Owned: <?php echo $cardInfo; ?></h3>
            <div id="profileFeature">
                <div id="favoriteCardContainer">
                    <h4><?php echo $_GET["username"]; ?>'s favorite Card!</h4>
                    <img src="img/cards/<?php echo $userFav; ?>.png">
                </div>
                <div id="mostOwnedContainer">
                    <h4><?php echo $_GET["username"]; ?>'s most owned Card!</h4>
                    <img src="img/cards/<?php echo $maxCard; ?>.png">
                </div>
            </div>
        </div>

</div>