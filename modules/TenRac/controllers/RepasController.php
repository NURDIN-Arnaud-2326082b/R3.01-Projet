<?php
require_once '../models/db_connect.php';
require_once '../models/RepasModel.php';
#[AllowDynamicProperties] class RepasController{
    public function Verifdate($date_base) {
        $date_aujourdhui = date("Y-m-d");
        return $date_aujourdhui === $date_base;
    }
}?>