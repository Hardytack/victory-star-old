<?php

require_once("header.php");

$query = $con->prepare("SELECT * FROM users WHERE username = :un");
$query->bindParam(":un", $_SESSION["TCGLoggedIn"]);
$query->execute();

$adminTest = $query->fetch(PDO::FETCH_ASSOC);

if ($adminTest["level"] != "Admin") {
    header('Location: http://localhost/tcgworld/index.php');
}


?>
    

            <div id="AddCardChoice">
            <label for="TitleType">What would you like to add?</label>
            <select class="form-control" id="Choice1">
                <option>New Set</option>
                <option>New Card</option>
            </select>
              <a href="newCardTypes/newSet.php" id="selectNewCardLink"><button id="selectNewCardButton" class="btn btn-primary">Select</button></a>
          </div>

             


      
      

    <!-- Optional JavaScript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="main.js"></script>
      
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


