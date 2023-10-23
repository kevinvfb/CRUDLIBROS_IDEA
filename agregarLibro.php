<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Libro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       
        .form-section {
            margin-bottom: 20px;
        }

        
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php 
        include("menu/admin.html");
        include("logica/database.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Nuevo Libro</h3>

                <form action="logica/proceso_agregar_libro.php" method="POST">
                    <fieldset class="form-section">
                        <legend>Detalles del Libro</legend>
                        <div class="form-group">
                            <label for="id">ID Libro:</label>
                            <input id="id" name="id" type="text" required="required" class="form-control" placeholder="Ejemplo: L001">
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input id="titulo" name="titulo" type="text" class="form-control" required="required" placeholder="Ejemplo: El Gran Gatsby">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input id="autor" name="autor" type="text" class="form-control" required="required" placeholder="Ejemplo: F. Scott Fitzgerald">
                        </div>
                        <div class="form-group">
                            <label for="genero">Género:</label>
                            <input id="genero" name="genero" type="text" class="form-control" required="required" placeholder="Ejemplo: Novela">
                        </div>
                        <div class="form-group">
                            <label for="anio_publicacion">Año de Publicación:</label>
                            <input id="anio_publicacion" name="anio_publicacion" type="number" class="form-control" required="required" placeholder="Ejemplo: 1925">
                        </div>
                    </fieldset>
                    <fieldset class="form-section">
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required" placeholder="Ejemplo: Una novela clásica ambientada en la década de 1920."></textarea>
                    </fieldset>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reiniciar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
