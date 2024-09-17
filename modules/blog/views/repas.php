<?php
$page_title = "Repas";
$css_files = "style.css";
include __DIR__ . '/../controllers/header.php';
header_page($page_title, $css_files);
?>

<?php
function pageRepas()
{
    ?><p>Ceci est la page des repas.</p>
<?php
}

pageRepas();

?>

