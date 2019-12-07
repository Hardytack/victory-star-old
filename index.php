<?php require_once("config.php"); ?>
<?php require_once("includes/Search.php"); ?>
<?php require_once("homeNavbar.php"); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">

<div id="homePageBody">
    <div id="featuredCardContainer"></div>
    <div id="mostPopularCardContainer"></div>
    <div id="globalStatContainer"></div>
<h3 style="text-align: center;">Newest Cards Added</h3>
<table class="table table-striped table-bordered table-hover searchResult">
    <thead class="thead-dark">
        <tr>
            <th>Card Name</th>
            <th>Set Name</th>
            <th>Card Number</th>
            <th>Print Style</th>
        </tr>
    </thead>
    <?php
        $newCards = $con->prepare("SELECT * FROM cards ORDER BY id DESC LIMIT 5");
        $newCards->execute();
        $html = "";
        while($cardQuery = $newCards->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>
                            <a href='card.php?cardCode=".$cardQuery["codeName"]."'>".$cardQuery["cardName"]."</a>
                        </td>
                        <td>
                            <a href='cardlists.php?setName=".$cardQuery["setName"]."'>".$cardQuery["setName"]."</a>
                        </td>
                        <td>
                            ".$cardQuery["cardNumber"]."
                        </td>
                        <td>
                            ".$cardQuery["printStyle"]."
                        </td>
                    </tr>";
        }
    echo $html;
    
    ?>
</table>
<h3 style="text-align: center;">Newest Sets Added</h3>
<table class="table table-striped table-bordered table-hover searchResult">
    <thead class="thead-dark">
        <tr>
            <th>Set Name</th>
            <th>Format</th>
            <th>Number of Cards</th>
            <th>Set Number</th>
        </tr>
    </thead>
    <?php
        $newCards = $con->prepare("SELECT * FROM sets ORDER BY id DESC LIMIT 5");
        $newCards->execute();
        $html = "";
        while($cardQuery = $newCards->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>
                            <a href='cardlists.php?setName=".$cardQuery["SetName"]."'>".$cardQuery["SetName"]."</a>
                        </td>
                        <td>
                            ".$cardQuery["Format"]."</a>
                        </td>
                        <td>
                            ".$cardQuery["NumOfCards"]."
                        </td>
                        <td>
                            ".$cardQuery["SetNumber"]."
                        </td>
                    </tr>";
        }
    echo $html;
    
    ?>
</table>
    
</div>





<?php

require_once("footer.php");

?>