
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <title>Formulario de Canciones </title>
</head>

<body>
    <header>
        <h1>Formulario Canciones</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Nombre Cancion </th>
                <th scope="" col> Duracion </th>
                <th scope="" col>  Id Genero </th>
                <th scope="" col> Id Artista </th>
                
                
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Canciones.php");
            $objetoCancion = new Canciones($conexion,0,'nombre','dura','idg','ida');
            $listaCancion = $objetoCancion->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaCancion)) {
                echo '<tr><form id ="fModificarCancion' . $unRegistro["idCancion"] . '" action="../Controlador/ControladorCanciones.php" method="post">';
                echo '<td><input type= "hidden" name="fidCancion"   value="' . $unRegistro['idCancion'] . '">';
                echo '    <input type= "text" name="fnombreCancion"   value="' . $unRegistro['nombreCancion'] . '"></td>';
                echo '<td><input type= "text" name="fduracionCancion"   value="' . $unRegistro['duracionCancion'] . '"></td>';
                echo '<td><input type= "number" name="fidGenero"   value="' . $unRegistro['idGenero'] . '"></td>';
                echo '<td><input type= "number" name="fidArtista"   value="' . $unRegistro['idArtista'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarCancion" action="../Controlador/ControladorCanciones.php" method="post">
                    <td><input type="hidden" name="fidCancion" value="0">
                        <input type="text" name="fnombreCancion"></td>
                    <td><input type="text" name="fduracionCancion"></td>
                    <td><input type="number" name="fidGenero"></td>
                    <td><input type="number" name="fidArtista"></td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaCancion);
    $objetoConexion->desconectar($conexion);
    ?>


</body>
<html>