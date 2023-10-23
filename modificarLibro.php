<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Libro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php 
        include("menu/admin.html");
        include("logica/database.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Modificar Libro</h3>
                <?php
                    $libros = new Database();
                    if(isset($_GET["id"]) && !empty($_GET["id"])){
                        $id = $libros->sanitize($_GET["id"]);
                        $res = $libros->buscarLibro($id);
                        if($res){
                ?>
                        <form action="logica/proceso_modificar_libro.php" method="POST">
                            <div class="form-group">
                                <label for="id">ID Libro</label>
                                <input id="id" name="id" type="text" value="<?php echo $res->id; ?>" required="required" readonly="" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input id="titulo" name="titulo" type="text" value="<?php echo $res->titulo; ?>" class="form-control" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor:</label>
                                <input id="autor" name="autor" type="text" value="<?php echo $res->autor; ?>" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="genero">Género:</label>
                                <input id="genero" name="genero" type="text" value="<?php echo $res->genero; ?>" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="anio_publicacion">Año de Publicación:</label>
                                <input id="anio_publicacion" name="anio_publicacion" type="number" value="<?php echo $res->anio_publicacion; ?>" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"><?php echo $res->descripcion; ?></textarea>
                          
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                            </div>
                        </form>
                <?php
                        } else {
                            echo "<div class='alert alert-danger'>Libro no encontrado</div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
