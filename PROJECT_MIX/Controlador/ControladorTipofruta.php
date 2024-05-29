<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Tipofruta.php");

     $opcion = $_POST["fenviar"];
     $idTipofruta = $_POST["fidTipofruta"];
     $descripcionTipofruta = $_POST["fdescripcionTipofruta"];
     

     $descripcionTipofruta = htmlspecialchars($descripcionTipofruta);
    


     $objetoTipofruta = new Tipofruta($conexion,$idTipofruta,$descripcionTipofruta);
    
     switch($opcion){
        case 'Ingresar':
            $objetoTipofruta->Ingresar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoTipofruta->Actualizar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoTipofruta->Elimina();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../vista/formularioTipofruta.php?msj = $mensaje");
?>