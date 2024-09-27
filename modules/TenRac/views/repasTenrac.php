<?php
$page_title = "Repas";
$css_files = "Repas.css";

global $userController, $conn;
require_once __DIR__ . '/../controllers/header.php';
require_once __DIR__ . '/../controllers/footer.php';
require_once '../models/DbConnect.php';
require_once '../controllers/TenracController.php';
require_once '../models/RepasModel.php';
require_once '../controllers/RepasController.php';
header_page($page_title, $css_files);



?>