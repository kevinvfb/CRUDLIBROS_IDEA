<?php
class Database{
    private $con;
    private $dbhost = "mysql8002.site4now.net";
    private $dbuser = "a9edc0_anyelo";
    private $dbpass = "anyelo123";
    private $dbname = "db_a9edc0_anyelo";

    public function conectar(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexion a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function sanitize($var){
        $this->conectar();
        $varlimpia = mysqli_real_escape_string($this->con, $var);
        mysqli_close($this->con);
        return $varlimpia;
    }

    public function insertarLibro($id, $titulo, $autor, $genero, $anio_publicacion, $descripcion){
        $this->conectar();
        $sql = "INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `anio_publicacion`, `descripcion`) 
        VALUES ('$id', '$titulo', '$autor', '$genero', '$anio_publicacion', '$descripcion')";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function mostrarLibros(){
        $this->conectar();
        $sql = "SELECT * FROM libros";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        return $res;
    }

    
    public function buscarLibro($id){
        $this->conectar();
        $sql = "SELECT * FROM libros WHERE id = '$id'";
        $res = mysqli_query($this->con, $sql);
        $res2 = mysqli_fetch_object($res);
        mysqli_close($this->con);
        return $res2;
    }
    

    public function actualizarLibro($id, $titulo, $autor, $genero, $anio_publicacion, $descripcion){
        $this->conectar();
        $sql = "UPDATE `libros` SET 
        `titulo` = '$titulo', 
        `autor` = '$autor', 
        `genero` = '$genero', 
        `anio_publicacion` = '$anio_publicacion', 
        `descripcion` = '$descripcion', 
        
        WHERE `libros`.`id` = '$id'";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function mostrarLibrosConFiltro($busqueda){
        $this->conectar();
        $sql = "SELECT * FROM libros WHERE titulo LIKE '%$busqueda%' OR autor LIKE '%$busqueda%' OR genero LIKE '%$busqueda%'";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        return $res;
    }
    

    public function eliminarLibro($id){
        $this->conectar();
        $sql = "DELETE FROM `libros` WHERE `libros`.`id` = '$id'";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        if($res){
            return true;
        }else{
            return false;
        }
    }

    public function insertarResena($libro_title, $estado_lectura, $calificacion, $contenido) {
        $this->conectar();
        
        $libro_title = mysqli_real_escape_string($this->con, $libro_title);
        $estado_lectura = mysqli_real_escape_string($this->con, $estado_lectura);
        $calificacion = (int)$calificacion; // Asegurarse de que $calificacion sea un entero.
        $contenido = mysqli_real_escape_string($this->con, $contenido);
    
        $query = "INSERT INTO ResenasLibros (libro_title, estado_lectura, calificacion, contenido) 
                  VALUES ('$libro_title', '$estado_lectura', $calificacion, '$contenido')";
        
        $res = mysqli_query($this->con, $query);
        mysqli_close($this->con);
    
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarResenasLibros(){
        $this->conectar();
        $sql = "SELECT * FROM ResenasLibros";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        return $res;
    }

    public function mostrarResenasLibrosConFiltro($busqueda){
        $this->conectar();
        $sql = "SELECT * FROM ResenasLibros WHERE libro_title LIKE '%$busqueda%' OR estado_lectura LIKE '%$busqueda%' OR calificacion LIKE '%$busqueda%'";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
        return $res;
    }

    public function buscarResena($busqueda) {
        $this->conectar();
        $busqueda = $this->sanitize($busqueda); // Limpia la entrada del usuario
    
        $sql = "SELECT * FROM ResenasLibros WHERE libro_title LIKE '%$busqueda%' OR estado_lectura LIKE '%$busqueda%' OR calificacion LIKE '%$busqueda%'";
        $res = mysqli_query($this->con, $sql);
        mysqli_close($this->con);
    
        return $res;
    }
    
}
?>
