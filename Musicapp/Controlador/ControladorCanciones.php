<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Canciones.php");

     $opcion = $_POST["fenviar"];
     $idCancion = $_POST["fidCancion"];
     $nombreCancion = $_POST["fnombreCancion"];
     $duracionCancion = $_POST["fduracionCancion"];
     $idGenero = $_POST["fidGenero"];
     $idArtista = $_POST["fidArtista"];
     

    $nombreCancion = htmlspecialchars($nombreCancion);
    $duracionCancion = htmlspecialchars($duracionCancion);
    $idGenero= htmlspecialchars($idGenero);
    $idArtista = htmlspecialchars($idArtista);


     $objetoCancion = new Canciones($conexion,$idCancion,$nombreCancion,$duracionCancion,$idGenero,$idArtista);
    
     switch($opcion){
        case 'Ingresar':
            $objetoCancion->Ingresar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoCancion->Actualizar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoCancion->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../Vista/FormularioCancion.php?msj = $mensaje");
?>