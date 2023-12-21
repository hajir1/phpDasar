<?php
require_once "DesainPattern.php";
$createPattern = new Pattern();
if(isset($_GET{"nisn"}))
    $createPattern->deleteById($_GET["nisn"]);
?>