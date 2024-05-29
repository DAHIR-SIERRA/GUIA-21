<?php
class Fruta {
    private $_idFruta;
    private $_nombreFruta;
    private $_idTipofruta;
    private $_pesoFruta;
    private $_colorFruta;
    private $_conexion;
    private $_paginacion = 10;


    function __construct($conexion,$idFruta,$nombreFruta,$idTipofruta,$pesoFruta,$colorFruta) {
        $this->_idFruta = $idFruta;
        $this->_nombreFruta = $nombreFruta;
        $this->_idTipofruta = $idTipofruta;
        $this->_pesoFruta = $pesoFruta;
        $this->_colorFruta = $colorFruta;
        $this->_conexion = $conexion;
        
    }
    function __get( $k){
        return $this->$k;
    }

    function __set( $k,$v){
        $this->$k = $v;
        
    }

    function Ingresar (){
        $Insercion = mysqli_query($this->_conexion, "INSERT INTO Fruta (idFruta,nombreFruta,idTipofruta,pesoFruta,colorFruta) VALUES (NULL,
        '$this->_nombreFruta',
        '$this->_idTipofruta',
        '$this->_pesoFruta',
        '$this->_colorFruta')");
        return $Insercion;

    }
    function Actualizar (){
        $Modificacion = mysqli_query($this->_conexion,"UPDATE Fruta SET 
        idFruta= '$this->_idFruta',
        nombreFruta= '$this->_nombreFruta',
        idTipofruta= '$this->_idTipofruta',
        pesoFruta= '$this->_pesoFruta',
        colorFruta= '$this->_colorFruta'
         WHERE idFruta= $this->_idFruta");
        return $Modificacion;

    }
    function Eliminar () {
        $Eliminacion = mysqli_query ($this->_conexion,"DELETE FROM Fruta
        WHERE idFruta= $this->_idFruta");
        return $Eliminacion;
    }
    
    function CantidadPaginas () {
        $CantidadPaginas = mysqli_query($this->_conexion,"SELECT CEIL(COUNT(idFruta)/$this->_paginacion)
        AS cantidad from Fruta") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($CantidadPaginas);
      return $unRegistro["cantidad"];
    }
    function Listar ($pagina) {
        if($pagina <=0){
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Fruta ORDER BY idFruta") or die(mysqli_error($this->_conexion));
            return $listado;
        }
        else{
            $maxpagina = $pagina * $this->_paginacion;
            $minpagina = $pagina - $this->_paginacion;
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Fruta ORDER BY idFruta LIMIT $minpagina,$maxpagina") or die (mysqli_error($this->_conexion));
            return $listado;

}
    }
}
        
?>