<?php
require_once("config.php");

if(isset($_POST["submitButton"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $password = hash("sha512", $password);
    
    $query = $con->prepare("SELECT * FROM users WHERE username=:un AND password=:pw");
    $query->bindParam(":un", $username);
    $query->bindParam(":pw", $password);
    
    $query->execute();
    
    if($query->rowCount() == 1) {
        $_SESSION["TCGLoggedIn"] = $username;
        header("Location: admin.php");
    } else {
        echo "Login Failed";
    }
}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">

<form action="signin.php" method="POST">
  <div class="form-row">
    <div class="form-group signin">
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
    </div>
    <div class="form-group signin">
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary signin" name="submitButton">Sign in</button>
    
</form>