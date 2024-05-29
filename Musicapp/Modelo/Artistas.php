<?php
class Artistas {
    private $_idArtista;
    private $_nombreArtista;
    private $_nacionalidadArtista;
    private $_conexion;
    private $_paginacion = 10;


    function __construct($conexion,$idArtista,$nombreArtista,$nacionalidadArtista) {
        $this->_idArtista = $idArtista;
        $this->_nombreArtista = $nombreArtista;
        $this->_nacionalidadArtista = $nacionalidadArtista;
        $this->_conexion = $conexion;
        
    }
    function __get( $k){
        return $this->$k;
    }

    function __set( $k,$v){
        $this->$k = $v;
        
    }

    function Ingresar (){
        $Insercion = mysqli_query($this->_conexion, "INSERT INTO Artistas (idArtista,nombreArtista,nacionalidadArtista) VALUES (NULL,
        '$this->_nombreArtista',
        '$this->_nacionalidadArtista')");
        return $Insercion;

    }
    function Actualizar (){
        $Modificacion = mysqli_query($this->_conexion,"UPDATE Artistas SET 
        idArtista= '$this->_idArtista',
        nombreArtista= '$this->_nombreArtista',
        nacionalidadArtista= '$this->_nacionalidadArtista'
         WHERE idArtista= $this->_idArtista");
        return $Modificacion;

    }
    function Eliminar () {
        $Eliminacion = mysqli_query ($this->_conexion,"DELETE FROM Artistas
        WHERE idArtista= $this->_idArtista");
        return $Eliminacion;
    }
    
    function CantidadPaginas () {
        $CantidadPaginas = mysqli_query($this->_conexion,"SELECT CEIL(COUNT(idArtista)/$this->_paginacion)
        AS cantidad from Artistas") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($CantidadPaginas);
      return $unRegistro["cantidad"];
    }
    function Listar ($pagina) {
        if($pagina <=0){
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Artistas ORDER BY idArtista") or die(mysqli_error($this->_conexion));
            return $listado;
        }
        else{
            $maxpagina = $pagina * $this->_paginacion;
            $minpagina = $pagina - $this->_paginacion;
            $listado = mysqli_query($this->_conexion,"SELECT * FROM Artistas   ORDER BY idArtista LIMIT $minpagina,$maxpagina") or die (mysqli_error($this->_conexion));
            return $listado;

}
    }
}
        
?>