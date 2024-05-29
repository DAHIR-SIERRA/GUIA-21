
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <title>Forulario de Artistas </title>
</head>

<body>
    <header>
        <h1>Formulario Artistas</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Nombre Artista </th>
                <th scope="" col> Nacionalidad </th>
                
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Artistas.php");
            $objetoArtista = new Artistas($conexion,0,'nombre','nacionalidad');
            $listaArtista = $objetoArtista->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaArtista)) {
                echo '<tr><form id ="fModificarArtista' . $unRegistro["idArtista"] . '" action="../Controlador/ControladorArtistas.php" method="post">';
                echo '<td><input type= "hidden" name="fidArtista"   value="' . $unRegistro['idArtista'] . '">';
                echo '    <input type= "text" name="fnombreArtista"   value="' . $unRegistro['nombreArtista'] . '"></td>';
                echo '<td><input type="text" name="fnacionalidadArtista"   value="' . $unRegistro['nacionalidadArtista'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarCliente" action="../Controlador/ControladorArtistas.php" method="post">
                    <td><input type="hidden" name="fidArtista" value="0">
                        <input type="text" name="fnombreArtista">
                    </td>
                    <td><input type="text" name="fnacionalidadArtista"></td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaArtista);
    $objetoConexion->desconectar($conexion);
    ?>


</body>
<html>