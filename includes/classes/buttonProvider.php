<?php

class buttonProvider {
    
    public static function createFavoriteButton($action, $class, $username) {
        
        return "<i class='$class' onclick='$action'></i>";
        
    }
    
}


?>