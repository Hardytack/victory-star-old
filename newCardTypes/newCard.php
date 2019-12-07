<?php

require_once("../header.php");

?>
    
      <form action="../uploads/uploadNewCard.php" method="POST" enctype="multipart/form-data" id="Single">
          
          <div class="form-group">
            <input type="hidden" class="form-control" id="Type" name="Type" value="New Card" readonly>
          </div>
          
          <div class="form-group">
            <label for="simpleName">Simple Name</label>
            <input type="text" class="form-control" id="simpleName" placeholder="Caterpie" name="simpleName" required>
          </div>
          
          <div class="form-group">
            <label for="cardName">Full Card Name</label>
            <input type="text" class="form-control" id="cardName" placeholder="Caterpie GX" name="cardName" required>
          </div>
          
          <div class="form-group">
              <label for="cardType">Card Type</label>
              <select class="form-control" id="cardType" name="cardType" required>
                    <option>Pokemon</option>
                    <option>Trainer</option>
                    <option>Energy</option>
                </select>
            </div>
          
          <div class="form-group">
              <label for="subType">Sub Type</label>
              <select class="form-control" id="cardSubType" name="subType" required>
                    <option>Basic</option>
                    <option>Stage 1</option>
                    <option>Stage 2</option>
                    <option>Restored</option>
                    <option>Level Up</option>
                    <option>BREAK</option>
                </select>
          </div>
          
          <div class="form-group">
              <label for="variantType">Variant Type</label>
              <select class="form-control" id="variantType" name="variantType" required>
                    <option>None</option>
                    <option>GX</option>
                    <option>Tag Team GX</option>
                    <option>EX</option>
                    <option>Prime</option>
                    <option>Prism Star</option>
                    <option>Ultra Beast</option>
                    <option>Delta Species</option>
                </select>
          </div>
          
          <div class="form-group">
              <label for="format">Format</label>
              <select class="form-control" id="format" name="format" required>
                    <option>Standard</option>
                    <option>Expanded</option>
                    <option>Unlimited</option>
                </select>
          </div>
          <div class="form-group">
              <label for="setList">Set Name</label>
              <select class="form-control" id="setName" name="setName" onload="javascript:loadSetList()" required>
                    <option>Loading...</option>
                </select>
          </div>
          
          <div class="form-group">
            <label for="cardNumber">Card Number</label>
            <input type="number" class="form-control" id="cardNumber" placeholder="1" name="cardNumber" required>
          </div>
          
          
          <div class="form-group">
              <label for="format">Print-Style</label>
              <select class="form-control" id="printStyle" name="printStyle" required>
                    <option>None</option>
                    <option>Reverse-Holo</option>
                    <option>Holo</option>
                    <option>EX/GX Half Art</option>
                    <option>Prism Holo</option>
                    <option>Full Art</option>
                    <option>Rainbow Art</option>
                    <option>Alt-Art</option>
                    <option>League or Pre-Release Promo</option>
              </select>
            </div>
          
          <div class="form-group">
            <label for="codeName">Code Name</label>
            <input type="text" class="form-control" id="codeName" placeholder="SUM1" name="codeName" required>
          </div>
          
          
        <div class="form-group">
            <label for="UploadPic">Card Image</label>
            <input type="file" class="form-control-file" id="UploadPic" name="UploadPic" required>
        </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="uploadButton" name="uploadButton">Submit</button>
              <a href="../index.php"><button class="btn btn-primary" id="goBack" type="button">Back</button></a>
          </div>
      </form>
      
      

    <!-- Optional JavaScript -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="../main.js"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            loadSetList();
        });
    </script>
      
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>