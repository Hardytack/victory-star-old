<?php

require_once("../config.php");

if(!isset($_POST["uploadButton"])) {
    echo "No file Sent to Server";
}

else if ($_POST["Type"] == "New Card") {
    
    $query = $con->prepare("SELECT * FROM cards WHERE codeName = :cn");
    $query->bindParam(":cn", $_POST["codeName"]);
    $query->execute();
    
    if ($query->rowCount() > 0) {
        echo "<p>Card already exists...</p>";
            
        echo "<a href='../index.php'>Return to Home</a>";
    }
    
    else {
    
    
    
    // 1) CreaTe File Upload Data
        // 1.1 - Make Variables from Uploaded Data
    
    // 2) Process Data
        // 2.1 - Target Directory
        $targetDir = "../img/cards/";
        $targetFile = $targetDir . basename($_FILES["UploadPic"]["name"]);
        $uploadDir = "img/cards/". basename($_FILES["UploadPic"]["name"]);
        $urlName = urlencode($_POST["codeName"]);
    
        // 2.2 - Confirms valid file extension
    
        // 2.2.1 - Confirm it IS an Image
        $imageCheck = getimagesize($_FILES["UploadPic"]["tmp_name"]);
        if(!$imageCheck) {
            echo "File is not an image";
        }
            
        // 2.3 - Remove any Spaces in file name
        // 2.4 - Move file to Folder
        if(move_uploaded_file($_FILES["UploadPic"]["tmp_name"], $targetFile)) {
            $query = $con->prepare("INSERT INTO cards(simpleName, cardName, cardType, subType, variantType, format, setName, cardNumber, printStyle, codeName, picturePath) VALUES(:simpleName, :cardName, :cardType, :subType, :variantType, :format, :setName, :cardNumber, :printStyle, :codeName, :picturePath)");
            $query->bindParam(":simpleName", $_POST["simpleName"]);
            $query->bindParam(":cardName", $_POST["cardName"]);
            $query->bindParam(":cardType", $_POST["cardType"]);
            $query->bindParam(":subType", $_POST["subType"]);
            $query->bindParam(":variantType", $_POST["variantType"]);
            $query->bindParam(":format", $_POST["format"]);
            $query->bindParam(":setName", $_POST["setName"]);
            $query->bindParam(":cardNumber", $_POST["cardNumber"]);
            $query->bindParam(":printStyle", $_POST["printStyle"]);
            $query->bindParam(":codeName", $_POST["codeName"]);
            $query->bindParam(":picturePath", $uploadDir);
            
            
            
            if($query->execute()) {
                echo "<p>Card Upload Success!</p>";
            
                echo "<a href='../index.php'>Return to Home</a>";
            } else {
                echo "An error has occured";
            }
        }
        // 2.5 - Insert Data into Table
    
    // 3) Check is upload is Successful
    
    
 }
    
}

else if ($_POST["Type"] == "Update Wrestler") {
    
        
    // 0) Get Wrestler's Info
    $WrestlerName = $_POST["WrestlerName"];
    $wrestler = $con->prepare("SELECT * FROM wrestlers WHERE WrestlerName = :name");
    $wrestler->bindParam(":name", $WrestlerName);
    if($wrestler->execute()) {
        // 1) Delete Old Photo
            $data = $wrestler->fetch(PDO::FETCH_ASSOC);
            $oldDir = "../";
            $oldDir .= $data["WrestlerPic"];
            unlink($oldDir);
    
        // 2.1) New Photo Directory
            $newDir = "../img/";
            $newFile = $newDir . basename($_FILES["UploadPic"]["name"]);
            $uploadDir = "img/". basename($_FILES["UploadPic"]["name"]);
        
        // 2.2) Check Image Size
            $imageCheck = getimagesize($_FILES["UploadPic"]["tmp_name"]);
            if(!$imageCheck) {
                echo "File is not an image";
            }

        // 3) Update SQL Table with new Dir
            if(move_uploaded_file($_FILES["UploadPic"]["tmp_name"], $newFile)) {
                $query = $con->prepare("UPDATE wrestlers SET WrestlerPic = :pic WHERE WrestlerName = :name");
                $query->bindParam(":name", $WrestlerName);
                $query->bindParam(":pic", $uploadDir);
                if($query->execute()) {
                    echo "<p>Wrestler Upload Success!</p>";

                    echo "<a href='../index.php'>Return to Home</a>";
                } else {
                    echo "An error has occured";
                }
            }
    }
     else {
         "failed";
     }
    
    // 1) Delete Old Photo
    //$oldDir = "../";
    
    // 2) Upload New Photo
    
    // 3) Update SQL Table with new Dir
    
    
   /* // 2) Process Data
        // 2.1 - Target Directory
        $targetDir = "../img/";
        $targetFile = $targetDir . basename($_FILES["UploadPic"]["name"]);
        $uploadDir = "img/". basename($_FILES["UploadPic"]["name"]);
        $urlName = urlencode($_POST["WrestlerName"]);
    
        // 2.2 - Confirms valid file extension
    
        // 2.2.1 - Confirm it IS an Image
        $imageCheck = getimagesize($_FILES["UploadPic"]["tmp_name"]);
        if(!$imageCheck) {
            echo "File is not an image";
        }
            
        // 2.3 - Remove any Spaces in file name
        // 2.4 - Move file to Folder
        if(move_uploaded_file($_FILES["UploadPic"]["tmp_name"], $targetFile)) {
            $query = $con->prepare("INSERT INTO wrestlers(URLName, WrestlerName, WrestlerPic) VALUES(:url, :name, :pic)");
            $query->bindParam(":name", $_POST["WrestlerName"]);
            $query->bindParam(":pic", $uploadDir);
            $query->bindParam(":url", $urlName);
            if($query->execute()) {
                echo "<p>Wrestler Upload Success!</p>";
            
                echo "<a href='../index.php'>Return to Home</a>";
            } else {
                echo "An error has occured";
            }
        }*/
}

?>