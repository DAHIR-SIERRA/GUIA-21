<?php
class Generos {
    private $_idGenero;
    private $_descripcionGenero;
    private $_conexion;
    private $_paginacion = 10;


    function __construct($conexion,$idGenero,$descripcionGenero) {
        $this->_idGenero = $idGenero;
        $this->_descripcionGenero = $descripcionGenero;
        $this->_conexion = $conexion;
        
    }
    function __get( $k){
        return $this->$k;
    }

    function __set( $k,$v){
        $this->$k = $v;
        
    }

    function Ingresar (){
        $Insercion = mysqli_query($this->_conexion, "INSERT INTO Generos (idGenero,descripcionGenero) VALUES (NULL,
        '$this->_descripcionGenero')");
        return $Insercion;

    }
    function Actualizar (){
        $Modificacion = mysqli_query($this->_conexion,"UPDATE Generos SET 
        idGenero= '$this->_idGenero',
        descripcionGenero= '$this->_descripcionGenero'
         WHERE idGenero= $this->_idGenero");
        return $Modificacion;

    }
    function Eliminar () {
        $Eliminacion = mysqli_query ($this->_conexion,"DELETE FROM Generos
        WHERE idGenero= $this->_idGenero");
        return $Eliminacion;
    }
    
    function CantidadPaginas () {
        $CantidadPaginas = mysqli_query($this->_conexion,"SELECT CEIL(COUNT(idGenero)/$this->_paginacion)
        AS cantidad from Generos") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($CantidadPaginas);
      return $unRegistro["cantidad"];
    }
    function Listar ($pagina) {
        if($pagina <=0){
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Generos ORDER BY idGenero") or die(mysqli_error($this->_conexion));
            return $listado;
        }
        else{
            $maxpagina = $pagina * $this->_paginacion;
            $minpagina = $pagina - $this->_paginacion;
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Generos ORDER BY idGenero LIMIT $minpagina,$maxpagina") or die (mysqli_error($this->_conexion));
            return $listado;

}
    }
}
        
?>