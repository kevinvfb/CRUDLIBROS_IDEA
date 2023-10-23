<?php
include("database.php");
$database = new Database();
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $database->sanitize($_GET["id"]);
    $res = $database->eliminarLibro($id); 
    if ($res) {
        header("Location: ../mostrarLibros.php?msg=3"); 
    } else {
        header("Location: ../mostrarLibros.php?msg=6");
    }
}

?>