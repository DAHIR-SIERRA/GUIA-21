<?php
class TipoFruta {
    private $_idTipofruta;
    private $_descripcionTipofruta;
    private $_conexion;
    private $_paginacion = 10;


    function __construct($conexion,$idTipofruta,$descripcionTipofruta) {
        $this->_idTipofruta = $idTipofruta;
        $this->_conexion = $conexion;
        $this->_descripcionTipofruta = $descripcionTipofruta;
    }
    function __get( $k){
        return $this->$k;
    }

    function __set( $k,$v){
        $this->$k = $v;
        
    }

    function Ingresar (){
        $Insercion = mysqli_query($this->_conexion, "INSERT INTO TipoFruta (idTipofruta,descrpcionTipofruta) VALUES (NULL,
        '$this->_descripcionTipofruta')");
        return $Insercion;

    }
    function Actualizar (){
        $Modificacion = mysqli_query($this->_conexion,"UPDATE Tipofruta SET 
        idTipofruta= '$this->_idTipofruta',
        descrpcionTipofruta= '$this->_descripcionTipofruta'
         WHERE idTipofruta= $this->_idTipofruta");
        return $Modificacion;

    }
    function Elimina () {
        $Eliminacion = mysqli_query ($this->_conexion,"DELETE FROM Tipofruta
        WHERE idTipofruta= $this->_idTipofruta");
        return $Eliminacion;
    }
    
    function CantidadPaginas () {
        $CantidadPaginas = mysqli_query($this->_conexion,"SELECT CEIL(COUNT(idTipofruta)/$this->_paginacion)
        AS cantidad from Tipofruta") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($CantidadPaginas);
      return $unRegistro["cantidad"];
    }
    function Listar ($pagina) {
        if($pagina <=0){
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Tipofruta ORDER BY idTipofruta") or die(mysqli_error($this->_conexion));
            return $listado;
        }
        else{
            $maxpagina = $pagina * $this->_paginacion;
            $minpagina = $pagina - $this->_paginacion;
            $listado = mysqli_query($this->_conexion,"SELECT * FROM TipoFruta ORDER BY idTipofruta LIMIT $minpagina,$maxpagina") or die (mysqli_error($this->_conexion));
            return $listado;

}
    }
}
        
?>