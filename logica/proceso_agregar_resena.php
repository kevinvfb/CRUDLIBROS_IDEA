<?php
include("database.php");
$libros = new Database();

if (isset($_POST) && !empty($_POST)) {
    $libro_title = $libros->sanitize($_POST['libro_title']);
    $estado_lectura = $libros->sanitize($_POST['estado_lectura']);
    $calificacion = $libros->sanitize($_POST['calificacion']);
    $contenido = $libros->sanitize($_POST['contenido']);

    $res = $libros->insertarResena($libro_title, $estado_lectura, $calificacion, $contenido);

    if ($res) {
        header("Location: ../mostrarReseña.php?msg=1");
    } else {
        header("Location: ../mostrarReseña.php?msg=4");
    }
}
?>
