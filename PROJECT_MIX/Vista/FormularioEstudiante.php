
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <title>Forulario de Estudiantes </title>
</head>

<body>
    <header>
        <h1>Formulario Estudiante</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Nombre Estudiante </th>
                <th scope="" col> Direccion Estudiante </th>
                <th scope="" col> Documento Estudiante </th>
                <th scope="" col> Fecha Nacimiento Estudiante </th>
                <th scope="" col> Correo Estudiante </th>
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Estudiante.php");
            $objetoEstudiante = new Estudiante($conexion,0,'nombre','direccion','documento','fechaNacimiento','correo');
            $listaEstudiante = $objetoEstudiante->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaEstudiante)) {
                echo '<tr><form id ="fModificarEtudiante' . $unRegistro["idEstudiante"] . '" action="../Controlador/controladorEstudiante.php" method="post">';
                echo '<td><input type= "hidden" name="fidEstudiante"   value="' . $unRegistro['idEstudiante'] . '">';
                echo '    <input type= "text" name="fnombreEstudiante"   value="' . $unRegistro['nombreEstudiante'] . '"></td>';
                echo '<td><input type="text" name="fdireccionEstudiante"   value="' . $unRegistro['direccionEstudiante'] . '"></td>';
                echo '<td><input type="number" name="fdocumentoEstudiante"   value="' . $unRegistro['documentoEstudiante'] . '"></td>';
                echo '<td><input type="date" name="ffechanacimientoEstudiante"   value="' . $unRegistro['fechanacimientoEstudiante'] . '"></td>';
                echo '<td><input type="email" name="fcorreoEstudiante"   value="' . $unRegistro['correoEstudiante'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarCliente" action="../Controlador/ControladorEstudiante.php" method="post">
                    <td><input type="hidden" name="fidEstudiante" value="0">
                        <input type="text" name="fnombreEstudiante">
                    </td>
                    <td><input type="text" name="fdireccionEstudiante"></td>
                    <td><input type="number" name="fdocumentoEstudiante"></td>
                    <td><input type="date" name="ffechanacimientoEstudiante"></td>
                    <td><input type="email" name="fcorreoEstudiante"></td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaEstudiante);
    $objetoConexion->desconectar($conexion);
    ?>


</body>
<html>