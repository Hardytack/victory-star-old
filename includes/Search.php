<?php

class search {
    
    private $con;
    public $searchType;
    
    public function __construct($con, $searchType) {
        $this->con = $con;
        $this->searchType = $searchType;
    }
    
    public function search($con, $searchType) {
        
        if($searchType == 'Wrestler' || isset($_GET["name"])) {
            $searchQuery = $con->prepare("SELECT * FROM matchresult WHERE winner1 = :searchName OR winner2 = :searchName OR winner3 = :searchName OR winner4 = :searchName OR loser1 = :searchName OR loser2 = :searchName OR loser3 = :searchName OR loser4 = :searchName OR loser5 = :searchName OR loser6 = :searchName OR loser7 = :searchName OR loser8 = :searchName OR loser9 = :searchName OR loser10 = :searchName OR loser11 = :searchName OR loser12 = :searchName OR loser13 = :searchName OR loser14 = :searchName OR loser15 = :searchName OR loser16 = :searchName OR loser17 = :searchName OR loser18 = :searchName OR loser19 = :searchName OR loser20 = :searchName OR loser21 = :searchName OR loser22 = :searchName OR loser23 = :searchName OR loser24 = :searchName OR loser25 = :searchName OR loser26 = :searchName OR loser27 = :searchName OR loser28 = :searchName OR loser29 = :searchName OR wrestler1 = :searchName OR wrestler2 = :searchName OR wrestler3 = :searchName OR wrestler4 = :searchName ORDER BY showdate");

            if ($searchType == 'Wrestler') {
                $searchQuery->bindParam(":searchName", $_POST['name']);
            }
            
            else if (isset($_GET["name"])) {
               $searchQuery->bindParam(":searchName", $_GET['name']); 
            }

            $searchQuery->execute(); 
        }
    
        else if($searchType == 'Event') {
            $searchQuery = $con->prepare("SELECT * FROM matchresult WHERE Event = :event ORDER BY showdate");

            $searchQuery->bindParam(":event", $_POST['name']);

            $searchQuery->execute(); 
        }
    
        else if($searchType == 'Championship') {
            $searchQuery = $con->prepare("SELECT * FROM matchresult WHERE Championship = :title ORDER BY showdate");

            $searchQuery->bindParam(":title", $_POST['name']);

            $searchQuery->execute(); 
        }
        
        else if (isset($_GET["show"])) {
                $searchQuery = $con->prepare("SELECT * FROM matchresult WHERE Event = :searchName");

                $searchQuery->bindParam(":searchName", $_GET['show']);

                $searchQuery->execute(); 
        }
        

        $searchReturn = "<table class='table table-striped table-bordered table-hover                       searchResult'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Match Type</th>
                                    <th>Winner(s)</th>
                                    <th>Loser(s)</th>
                                    <th>Finish</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                </tr>
                            </thead>";

        while($rowTest = $searchQuery->fetch(PDO::FETCH_ASSOC)) {
            if ($rowTest["matchType"] == "Singles Match") {
                $searchReturn .= "<tr><td>".$rowTest['matchType']."</td>
                                    <td><a href='wrestler.php?name=".$rowTest['Winner1']."'>".$rowTest['Winner1']."</a></td>
                                    <td><a href='wrestler.php?name=".$rowTest['Loser1']."'>".$rowTest['Loser1']."</a></td>
                                    <td>".$rowTest['Result']."</td>
                                    <td>".$rowTest['Event']."</td>
                                    <td>".$rowTest['ShowDate']."</td></tr>";
            } 
            else if ($rowTest["matchType"] == "Tag Team Match") {
                $searchReturn .= "<tr><td>".$rowTest['matchType']."</td>
                                    <td><a href='wrestler.php?name=".$rowTest['Winner1']."'>".$rowTest['Winner1']."</a>, <a href='wrestler.php?name=".$rowTest['Winner2']."'>".$rowTest['Winner2']."</a></td><td><a href='wrestler.php?name=".$rowTest['Loser1']."'>".$rowTest['Loser1']."</a>, <a href='wrestler.php?name=".$rowTest['Loser2']."'>".$rowTest['Loser2']."</a></td>
                                    <td>".$rowTest['Result']."</td>
                                    <td>".$rowTest['Event']."</td>
                                    <td>".$rowTest['ShowDate']."</td></tr>";
            }  
            
            
            
            
        }
          
          $searchReturn .= "</table>";
          
        return $searchReturn;
          
    }
        
        
    }
    
?>