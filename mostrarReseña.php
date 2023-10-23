<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reseñas de Libros</title>
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
                    <div class="col-sm-8"><h2>Reseñas de Libros</h2></div>
                </div>
                <?php include("logica/msg.php"); ?>
            </div>

            <!-- Formulario de Búsqueda -->
            <form method="post" action="mostrarReseña.php" class="form-inline mb-2">
                <div class="form-group">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar reseña por título de libro, estado de lectura, o calificación">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título del Libro</th>
                        <th>Estado de Lectura</th>
                        <th>Calificación</th>
                        <th>Contenido de la Reseña</th>
                    
                    </tr>
                </thead>
                <tbody>    
                <?php
                    include("logica/database.php");
                    $reseñas = new Database();

                    // Verificar si se ha enviado una búsqueda
                    if (isset($_POST['busqueda'])) {
                        // Obtener el término de búsqueda y limpiarlo
                        $busqueda = $reseñas->sanitize($_POST['busqueda']);

                        // Llamar a la función mostrarResenasLibros con el término de búsqueda
                        $listado = $reseñas->mostrarResenasLibrosConFiltro($busqueda);
                    } else {
                        // Si no se ha enviado una búsqueda, mostrar todas las reseñas de libros
                        $listado = $reseñas->mostrarResenasLibros();
                    }

                    while($row = mysqli_fetch_object($listado)){
                        $id = $row->id;
                        $libro_title = $row->libro_title;
                        $estado_lectura = $row->estado_lectura;
                        $calificacion = $row->calificacion;
                        $contenido = $row->contenido;
                        
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $libro_title; ?></td>
                        <td><?php echo $estado_lectura; ?></td>
                        <td><?php echo $calificacion; ?></td>
                        <td><?php echo $contenido; ?></td>

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
