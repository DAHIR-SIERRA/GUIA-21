<?php
class Canciones {
    private $_idCanciones;
    private $_nombreCancion;
    private $_duracionCancion;
    private $_idGenero;
    private $_idArtista;
    private $_conexion;
    private $_paginacion = 10;


    function __construct($conexion,$_idCanciones,$nombreCancion,$duracionCancion,$idGenero,$idArtista) {
        $this->_idCanciones = $_idCanciones;
        $this->_nombreCancion = $nombreCancion;
        $this->_duracionCancion = $duracionCancion;
        $this->_idGenero = $idGenero;
        $this->_idArtista = $idArtista;
        $this->_conexion = $conexion;
        
    }
    function __get( $k){
        return $this->$k;
    }

    function __set( $k,$v){
        $this->$k = $v;
        
    }

    function Ingresar (){
        $Insercion = mysqli_query($this->_conexion, "INSERT INTO Canciones (idCancion,nombreCancion,duracionCancion,idGenero,idArtista) VALUES
        (NULL,
        '$this->_nombreCancion',
        '$this->_duracionCancion',
        '$this->_idGenero',
        '$this->_idArtista')");
        return $Insercion;

    }
    function Actualizar (){
        $Modificacion = mysqli_query($this->_conexion,"UPDATE Canciones SET 
        idCancion= '$this->_idCancion',
        nombreCancion= '$this->_nombreCancion',
        duracionCancion= '$this->_duracionCancion',
        idGenero= '$this->_idGenero',
        idArtista= '$this->_idArtista'
         WHERE idCancion= $this->_idCancion");
        return $Modificacion;

    }
    function Eliminar () {
        $Eliminacion = mysqli_query ($this->_conexion,"DELETE FROM Canciones
        WHERE idCancion= $this->_idCancion");
        return $Eliminacion;
    }
    
    function CantidadPaginas () {
        $CantidadPaginas = mysqli_query($this->_conexion,"SELECT CEIL(COUNT(idCancion)/$this->_paginacion)
        AS cantidad from Canciones") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($CantidadPaginas);
      return $unRegistro["cantidad"];
    }
    function Listar ($pagina) {
        if($pagina <=0){
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Canciones ORDER BY idCancion") or die(mysqli_error($this->_conexion));
            return $listado;
        }
        else{
            $maxpagina = $pagina * $this->_paginacion;
            $minpagina = $pagina - $this->_paginacion;
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Canciones ORDER BY idCancion LIMIT $minpagina,$maxpagina") or die (mysqli_error($this->_conexion));
            return $listado;

}
    }
}
        
?>