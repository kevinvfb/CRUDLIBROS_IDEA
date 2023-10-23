<?php
include("database.php");
$libros = new Database();
if(isset($_POST) && !empty($_POST)){
    $id = $libros->sanitize($_POST['id']);
    $titulo = $libros->sanitize($_POST['titulo']);
    $autor = $libros->sanitize($_POST['autor']);
    $genero = $libros->sanitize($_POST['genero']);
    $anio_publicacion = $libros->sanitize($_POST['anio_publicacion']);
    $descripcion = $libros->sanitize($_POST['descripcion']);
   

    $res = $libros->actualizarLibro($id, $titulo, $autor, $genero, $anio_publicacion, $descripcion);
    if($res){
        header("Location: ../mostrarLibros.php?msg=2");
    }else{
        header("Location: ../mostrarLibros.php?msg=5");
    }
}

?>