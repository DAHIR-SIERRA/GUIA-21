<?php
class Conexion {
    function Conectar(){
        $conexion = mysqli_connect("localhost","root","","musica");
        mysqli_query($conexion, "SET NAMES 'utf8'");
        return($conexion);
    }
    function Desconectar ($conexion){
        mysqli_close($conexion);
    }
}

?>