<?php

require_once("buttonProvider.php");

class favoriteCard {
    
    private $con;
    private $codeName = "";
    private $classType;
    
    public function __construct($con, $codeName, $classType, $username) {
        $this->codeName = $codeName;
        $this->con = $con;
        $this->classType = $classType;
        $this->username = $username;
    }
    
    public function createFavoriteButton() {
        
        $buttonAction = "favoriteCard(this, \"$this->codeName\", \"$this->username\")";
        
        $class = $this->classType;
        
        $un = $this->username;
        
        $createButton = buttonProvider::createFavoriteButton($buttonAction, $class, $un);
        
        return $createButton;
            
    }
    
    
}

?>