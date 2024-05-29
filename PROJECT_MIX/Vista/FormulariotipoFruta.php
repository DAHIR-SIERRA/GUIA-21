<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario Tipo de fruta  </title>
</head>
<body>
<body>
    <header>
        <h1>Formulario Estudiante</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Descripocion de la fruta </th>
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Tipofruta.php");
            $objetoTipofruta = new TipoFruta($conexion,0,'nombre');
            $listaTipofruta = $objetoTipofruta->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaTipofruta)) {
                echo '<tr><form id ="fModificarTipofruta' . $unRegistro["idTipofruta"] . '" action="../Controlador/controladorTipofruta.php" method="post">';
                echo '<td><input type= "hidden" name="fidTipofruta"   value="' . $unRegistro['idTipofruta'] . '">';
                echo '    <input type= "text" name="fdescripcionTipofruta"   value="' . $unRegistro['descrpcionTipofruta'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarTipofruta" action="../Controlador/ControladorTipofruta.php" method="post">
                    <td><input type="hidden" name="fidTipofruta" value="0">
                        <input type="text" name="fdescripcionTipofruta">
                    </td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaTipofruta);
    $objetoConexion->desconectar($conexion);
    ?>

    
</body>
</html>