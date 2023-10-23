<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reseña de Libro</title>
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
                <h3>Nueva Reseña de Libro</h3>

                <form action="logica/proceso_agregar_resena.php" method="POST">
                    <fieldset class="form-section">
                        <legend>Detalles de la Reseña</legend>
                        <div class="form-group">
                            <label for="libro_title">Título del Libro:</label>
                            <input id="libro_title" name="libro_title" type="text" required="required" class="form-control" placeholder="Ejemplo: 'El Gran Gatsby'">
                        </div>
                        <label for="estado_lectura">Estado de Lectura:</label>
                        <select id="estado_lectura" name="estado_lectura" class="custom-select" required="required">
                        <option value="leido">Leído</option>
                        <option value="en_progreso">En Progreso</option>
                        <option value="no_leido">No Leído</option>
                        </select>

                        <section class="form-section">
                            <label for="calificacion">Calificación:</label>
                            <select id="calificacion" name="calificacion" class="custom-select" required="required">
                                <option value="5">5 - Excelente</option>
                                <option value="4">4 - Muy bueno</option>
                                <option value="3">3 - Bueno</option>
                                <option value="2">2 - Regular</option>
                                <option value="1">1 - Malo</option>
                            </select>
                        </section>

                        <div class="form-group">
                            <label for="contenido">Contenido de la Reseña:</label>
                            <textarea id="contenido" name="contenido" cols="40" rows="6" class="form-control" required="required" placeholder="Escribe tu reseña aquí..."></textarea>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Guardar Reseña</button>
                        <button type="reset" class="btn btn-secondary">Reiniciar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>