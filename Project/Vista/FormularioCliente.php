<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <title>Forulario Cliente </title>
</head>

<body>
    <header>
        <h1>Formulario Cliente</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Nombre Cliente </th>
                <th scope="" col> Documento Cliente </th>
                <th scope="" col> Email Cliente </th>
                <th scope="" col></th>
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Cliente.php");
            $objetoCliente = new Cliente($conexion, 0, 'nombre', 'documento', 'correo');
            $listaCliente = $objetoCliente->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaCliente)) {
                echo '<tr><form id ="fModificarCliente' . $unRegistro["idCliente"] . '" action="../Controlador/controladorCliente.php" method="post">';
                echo '<td><input type= "hidden" name="fidCliente"   value="' . $unRegistro['idCliente'] . '">';
                echo '    <input type= "text" name="fnombreCliente"   value="' . $unRegistro['nombreCliente'] . '"></td>';
                echo '<td><input type="number" name="fdocumentoCliente"   value="' . $unRegistro['documentoCliente'] . '"></td>';
                echo '<td><input type="email" name="fcorreoCliente"   value="' . $unRegistro['correoCliente'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarCliente" action="../Controlador/ControladorCliente.php" method="post">
                    <td><input type="hidden" name="fidCliente" value="0">
                        <input type="text" name="fnombreCliente">
                    </td>
                    <td><input type="number" name="fdocumentoCliente"></td>
                    <td><input type="email" name="fcorreoCliente"></td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaCliente);
    $objetoConexion->desconectar($conexion);
    ?>


</body>
<html>