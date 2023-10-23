<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-color: #5B3C0D;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        background-color: #F5DEB3;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .table-title h2 {
        color: #5B3C0D;
        font-size: 28px;
    }

    .table-bordered {
        border: 2px solid #5B3C0D;
    }

    .table-bordered th, .table-bordered td {
        border: 2px solid #5B3C0D;
    }

    .form-inline {
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #5B3C0D;
        border-color: #5B3C0D;
    }

    a {
        color: #5B3C0D;
    }

    .table-bordered tbody tr:nth-child(odd) {
        background-color: #D2B48C;
    }
    .container .table-bordered th, .container .table-bordered td {
        border: 2px solid #5B3C0D;
    }
</style>




</head>
<body>
    <?php include("menu/admin.html"); ?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Biblioteca de Libros</h2></div>
                </div>
                <?php include("logica/msg.php"); ?>
            </div>

            <!-- Formulario de Búsqueda -->
            <form method="post" action="mostrarLibros.php" class="form-inline mb-2">
                <div class="form-group">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar libro por título, autor o género">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Género</th>
                        <th>Año de Publicación</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>    
                <?php
                    include("logica/database.php");
                    $libros = new Database();

                    // Verificar si se ha enviado una búsqueda
                    if (isset($_POST['busqueda'])) {
                        // Obtener el término de búsqueda y limpiarlo
                        $busqueda = $libros->sanitize($_POST['busqueda']);

                        // Llamar a la función mostrarLibros con el término de búsqueda
                        $listado = $libros->mostrarLibrosConFiltro($busqueda);
                    } else {
                        // Si no se ha enviado una búsqueda, mostrar todos los libros
                        $listado = $libros->mostrarLibros();
                    }

                    while($row = mysqli_fetch_object($listado)){
                        $id = $row->id;
                        $titulo = $row->titulo;
                        $autor = $row->autor;
                        $genero = $row->genero;
                        $anio_publicacion = $row->anio_publicacion;
                        $descripcion = $row->descripcion;
                        
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $titulo; ?></td>
                        <td><?php echo $autor; ?></td>
                        <td><?php echo $genero; ?></td>
                        <td><?php echo $anio_publicacion; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td>
                            <a href="modificarLibro.php?id=<?php echo $id; ?>&mod"><i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="logica/proceso_eliminar.php?id=<?php echo $id; ?>"><i class="fa fa-trash" style="font-size:24px"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div> 
</body>
</html>
