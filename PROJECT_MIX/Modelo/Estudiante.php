<?php
class Estudiante {
    private $_conexion;
    private $_idEstudiante;
    private $_nombreEstudiante;
    private $_direccionEstudiante;
    private $_documentoEstudiante;
    private $_fechanacimientoEstudiante;
    private $_correoEstudiante;
    private $_paginacion = 10;

function __construct($conexion,$idEstudiante,$nombreEstudiante,$direccionEstudiante,
$documentoEstudiante,$fechanacimientoEstudiante,$CorreoEstudiante  ){
    $this->_conexion = $conexion;
    $this->_idEstudiante = $idEstudiante;
    $this->_nombreEstudiante = $nombreEstudiante;   
    $this->_direccionEstudiante = $direccionEstudiante;
    $this->_documentoEstudiante = $documentoEstudiante;
    $this->_fechanacimientoEstudiante = $fechanacimientoEstudiante;
    $this->_correoEstudiante = $CorreoEstudiante;
}
function __get($k){
    return $this->$k;
}
function __set($k,$v){
$this->$k = $v;
}
function Insertar (){
    $Insercion = mysqli_query($this->_conexion,"INSERT INTO Estudiante
    (idEstudiante,
    nombreEstudiante,
    direccionEstudiante,
    documentoEstudiante,
    fechanacimientoEstudiante,
    correoEstudiante)
    VALUES(NULL,'$this->_nombreEstudiante',
    '$this->_direccionEstudiante',
    '$this->_documentoEstudiante',
    '$this->_fechanacimientoEstudiante',
    '$this->_correoEstudiante')");
    return $Insercion;

}


function Modificar (){
    $Modificacion = mysqli_query($this->_conexion,"UPDATE Estudiante SET
    idEstudiante='$this->_idEstudiante',
    nombreEstudiante='$this->_nombreEstudiante',
    direccionEstudiante='$this->_direccionEstudiante',
    documentoEstudiante='$this->_documentoEstudiante',
    fechanacimientoEstudiante='$this->_fechanacimientoEstudiante',
    correoEstudiante='$this->_correoEstudiante' WHERE idEstudiante= $this->_idEstudiante");
    return $Modificacion;
}
function Eliminar (){
    $Eliminacion  = mysqli_query($this->_conexion,"DELETE FROM Estudiante
     WHERE idEstudiante=$this->_idEstudiante");
     return $Eliminacion;
}
function cantidadPaginas (){
    $cantidadBloques=mysqli_query($this->_conexion,
    "SELECT CEIL(COUNT(idEstudiante)/$this->_paginacion)
      AS cantidad from Estudiante") or die(mysqli_error($this->_conexion));
      $unRegistro=mysqli_fetch_array($cantidadBloques);
      return $unRegistro["cantidad"];
}
function listar ($Pagina){
    if ($Pagina <=0){
        $Listado = mysqli_query($this->_conexion,"SELECT * FROM 
        Estudiante ORDER BY idEstudiante") or die(mysqli_error($this->_conexion));
        return $Listado; 
    }
    else{
        $PaginacionMax= $Pagina  * $this->_paginacion;
        $PaginacionMin= $PaginacionMax - $this->_paginacion;
        $Listado = mysqli_query($this->_conexion,"SELECT * FROM Estudiante ORDER BY idEstudiante LIMIT
        $PaginacionMin , $PaginacionMax") or die (mysqli_error($this->_conexion));
        return $Listado;
    }
    
} 
        
}

?>
