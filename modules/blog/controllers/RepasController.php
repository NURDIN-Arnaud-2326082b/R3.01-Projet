<?php

global $date_aujourdhui, $date_base;
require_once '../models/db_connect.php';
require_once '../models/RepasModel.php';

    if($date_aujourdhui === $date_base){
            return True;
    }
    else{
        return False;
    }

?>