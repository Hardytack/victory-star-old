<?php

require_once("config.php");

    if(isset($_POST["submitButton"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = hash("sha512", $password);
        $query = $con->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(":username", $username);
        $query->execute();
        
        if($query->rowCount() == 0) {
            $newUser = $con->prepare("INSERT INTO users (username, password, level, profilePic, favoriteCard) VALUES(:username, :password, 'User', 'img/users/default.png', 'Not Set')");
            $newUser->bindParam(":username", $username);
            $newUser->bindParam(":password", $password);
            $addUser = $newUser->execute();
            if($addUser) {
                header("Location: index.php");
            } else {
                echo "Sign Up Failed";
            }
        } else {
            echo "Username already taken";
        }
    }


?>


<form action="signup.php" method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" requried>
    <input type="submit" name="submitButton" value="Sign Up">
</form>