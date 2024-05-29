<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Fruta.php");

     $opcion = $_POST["fenviar"];
     $idFruta = $_POST["fidFruta"];
     $nombreFruta = $_POST["fnombreFruta"];
     $idTipofruta = $_POST["fidTipofruta"];
     $pesoFruta = $_POST["fpesoFruta"];
     $colorFruta = $_POST["fcolorFruta"];
     

     $nombreFruta = htmlspecialchars($nombreFruta);
     $idTipofruta = htmlspecialchars($idTipofruta);
     $pesoFruta = htmlspecialchars($pesoFruta);
     $colorFruta = htmlspecialchars($colorFruta);
     
    


     $objetoTipofruta = new Fruta ($conexion,$idFruta,$nombreFruta,$idTipofruta,$pesoFruta,$colorFruta);
    
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
            $objetoTipofruta->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../vista/formularioFruta.php?msj = $mensaje");
?>