<?php

require_once("../config.php");

if(!isset($_POST["uploadButton"])) {
    echo "No file Sent to Server";
}

else {
    
    if($_POST["uploadType"] == "New Set") {
    
        $SetName = $_POST["setName"];
        $WebName = urlencode($SetName);
        $Format = $_POST["formatType"];
        $NumOfCards = $_POST["numOfCards"];
        $setNumber = $_POST["setNumber"];
        $setCode = $_POST["setCode"];

        $query = $con->prepare("INSERT INTO sets(setName, webName, Format, NumOfCards, setNumber, setCode) VALUES(:setName, :webName, :format, :numOfCards, :setNumber, :setCode)");
        $query->bindParam(":setName", $SetName);
        $query->bindParam(":webName", $WebName);
        $query->bindParam(":format", $Format);
        $query->bindParam(":numOfCards", $NumOfCards);
        $query->bindParam(":setNumber", $setNumber);
        $query->bindParam(":setCode", $setCode);


        if(!$query->execute()) {
            echo "Upload Failed";
        } else {
            
            echo "<p>Set Uploaded</p>";
            
            echo "<a href='../index.php'>Return to Home</a>";
        }
    }
    
    /*else if($_POST["TitleType"] == "Tag Title") {
    
        $MatchType = $_POST["MatchType"];
        $Title = $_POST["Title"];
        $NewChamp1 = $_POST["NewChamp1"];
        $NewChamp2 = $_POST["NewChamp2"];
        $OldChamp1 = $_POST["OldChamp1"];
        $OldChamp2 = $_POST["OldChamp2"];
        $Platform = $_POST["Platform"];
        $Show = $_POST["Show"];
        $ChampBeat = $_POST["ChampBeat"];

        $query = $con->prepare("INSERT INTO tagtitle(MatchType, Championship, NewChamp1, NewChamp2, OldChamp1, OldChamp2, Platform, Event, ChampBeat) VALUES(:matchType, :championship, :newChamp1, :newChamp2, :oldChamp1, :oldChamp2, :platform, :event, :champBeat)");
        $query->bindParam(":matchType", $MatchType);
        $query->bindParam(":championship", $Title);
        $query->bindParam(":newChamp1", $NewChamp1);
        $query->bindParam(":newChamp2", $NewChamp2);
        $query->bindParam(":oldChamp1", $OldChamp1);
        $query->bindParam(":oldChamp2", $OldChamp2);
        $query->bindParam(":platform", $Platform);
        $query->bindParam(":event", $Show);
        $query->bindParam(":champBeat", $ChampBeat);


        if(!$query->execute()) {
            echo "Upload Failed";
        } else {
            
            echo "<p>Title Change Uploaded</p>";
            
            echo "<a href='../index.php'>Return to Home</a>";
            
        }*/
    }
 
    
?>