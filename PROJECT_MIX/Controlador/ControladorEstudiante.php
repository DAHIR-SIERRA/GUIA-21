<?php 
     include_once("../Modelo/Conexion.php");
     $objetoConexion = new conexion();
     $conexion = $objetoConexion->conectar();

     include_once("../Modelo/Estudiante.php");

     $opcion = $_POST["fenviar"];
     $idEstudiante = $_POST["fidEstudiante"];
     $nombreEstudiante = $_POST["fnombreEstudiante"];
     $direccionEstudiante = $_POST["fdireccionEstudiante"];
     $documentoEstudiante = $_POST["fdocumentoEstudiante"];
     $fechanacimientoEstudiante = $_POST["ffechanacimientoEstudiante"];
     $correoEstudiante = $_POST["fcorreoEstudiante"];

     $nombreEstudiante = htmlspecialchars($nombreEstudiante);
     $direccionEstudiante = htmlspecialchars($direccionEstudiante);
     $documentoEstudiante = htmlspecialchars($documentoEstudiante);
     $fechanacimientoEstudiante = htmlspecialchars($fechanacimientoEstudiante);
     $correoEstudiante = htmlspecialchars($correoEstudiante);


     $objetoEstudiante = new Estudiante($conexion,$idEstudiante,$nombreEstudiante,
     $direccionEstudiante,$documentoEstudiante,$fechanacimientoEstudiante,$correoEstudiante);
    
     switch($opcion){
        case 'Ingresar':
            $objetoEstudiante->Insertar();
            $mensaje = "Ingresado";
            break;
        case 'Modificar':
            $objetoEstudiante->Modificar();
            $mensaje = "Modificado";
            break;
        case 'Eliminar':
            $objetoEstudiante->Eliminar();
            $mensaje = "Eliminar";
            break;
     }
     $objetoConexion->desconectar($conexion);
     header("location:../vista/formularioEstudiante.php?msj = $mensaje");
?>