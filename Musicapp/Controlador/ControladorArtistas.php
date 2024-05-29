<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Artistas.php");

     $opcion = $_POST["fenviar"];
     $idArtista = $_POST["fidArtista"];
     $nombreArtista = $_POST["fnombreArtista"];
     $nacionalidadArtista = $_POST["fnacionalidadArtista"];
     

    $nombreArtista = htmlspecialchars($nombreArtista);
    $nacionalidadArtista = htmlspecialchars($nacionalidadArtista);


     $objetoEstudiante = new Artistas($conexion,$idArtista,$nombreArtista,
     $nacionalidadArtista,);
    
     switch($opcion){
        case 'Ingresar':
            $objetoEstudiante->Ingresar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoEstudiante->Actualizar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoEstudiante->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../Vista/formularioArtista.php?msj = $mensaje");
?>