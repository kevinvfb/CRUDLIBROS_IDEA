<?php
    $errores = array(
        1 => "<div class='alert alert-success' role='alert'>Registro Agregado</div>",
        2 => "<div class='alert alert-success' role='alert'>Registro Actualizado</div>",
        3 => "<div class='alert alert-success' role='alert'>Registro Eliminado</div>",
        4 => "<div class='alert alert-danger' role='alert'>Error registro no agregado, intente de nuevo</div>",
        5 => "<div class='alert alert-danger' role='alert'>Error registro no actualizado, intente de nuevo</div>",
        6 => "<div class='alert alert-danger' role='alert'>Error registro no eliminado, intente de nuevo</div>",
    );

    if(isset($_GET["msg"]) && !empty($_GET["msg"])){
        $msg_id = $_GET["msg"];
        echo $errores[$msg_id];
    }
?>