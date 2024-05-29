<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Generos.php");

     $opcion = $_POST["fenviar"];
     $idGenero = $_POST["fidGenero"];
     $descripcionGenero = $_POST["fdescripcionGenero"];
     

    $descripcionGenero = htmlspecialchars($descripcionGenero);


     $objetoGenero = new Generos($conexion,$idGenero,$descripcionGenero);
    
     switch($opcion){
        case 'Ingresar':
            $objetoGenero->Ingresar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoGenero->Actualizar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoGenero->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../Vista/formularioGenero.php?msj = $mensaje");
?>