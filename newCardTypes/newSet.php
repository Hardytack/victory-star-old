<?php

require_once("../header.php");

?>
    
      <form action="../uploads/uploadNewSet.php" method="POST" enctype="multipart/form-data" id="Single">
          
          <div class="form-group">
            <input type="hidden" class="form-control" id="Type" name="uploadType" value="New Set" readonly>
          </div>
          
          <div class="form-group">
            <label for="Type">Set Name</label>
            <input type="text" class="form-control" id="setName" placeholder="Guardians Rising" name="setName">
          </div>
          
          <div class="form-group">
            <label for="Type">Format</label>
            <input type="text" class="form-control" id="setFormat" placeholder="Standard" name="formatType">
          </div>
          
          <div class="form-group">
            <label for="Type">Number of Cards</label>
            <input type="text" class="form-control" id="numOfCards" placeholder="150" name="numOfCards">
          </div>
          
          <div class="form-group">
            <label for="Type">Set Number</label>
            <input type="text" class="form-control" id="setNumber" placeholder="80" name="setNumber">
          </div>
          
          <div class="form-group">
            <label for="Type">Set Code</label>
            <input type="text" class="form-control" id="setCode" placeholder="setCode" name="setCode">
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="uploadButton" name="uploadButton">Submit</button>
              <a href="../index.php"><button class="btn btn-primary" id="goBack" type="button">Back</button></a>
          </div>
      </form>
      
      

    <!-- Optional JavaScript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="../main.js"></script>
      
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>