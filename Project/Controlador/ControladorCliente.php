<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Cliente.php");

     $opcion = $_POST["fenviar"];
     $idCliente = $_POST["fidCliente"];
     $nombreCliente = $_POST["fnombreCliente"];
     $documentoCliente = $_POST["fdocumentoCliente"];
     $correoCliente = $_POST["fcorreoCliente"];

     $nombreCliente = htmlspecialchars($nombreCliente);
     $documentoCliente = htmlspecialchars($documentoCliente);
     $correoCliente = htmlspecialchars($correoCliente);

     $objetoCliente = new Cliente($conexion,$idCliente,$nombreCliente,$documentoCliente,$correoCliente);
    
     switch($opcion){
        case 'Ingresar':
            $objetoCliente->Insertar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoCliente->Modificar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoCliente->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../vista/formularioCliente.php?msj = $mensaje");
?>