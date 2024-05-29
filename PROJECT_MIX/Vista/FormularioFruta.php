<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario Fruta  </title>
</head>
<body>
<body>
    <header>
        <h1>Formulario Fruta</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Nombre Fruta </th>
                <th scope="" col> id Tipo Fruta </th>
                <th scope="" col> Peso Fruta </th>
                <th scope="" col> Color Fruta </th>
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Fruta.php");
            $objetoFruta = new Fruta($conexion,0,'nombre','id','peso','color');
            $listaFruta = $objetoFruta->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaFruta)) {
                echo '<tr><form id ="fModificarFruta' . $unRegistro["idFruta"] . '" action="../Controlador/controladorFruta.php" method="post">';
                echo '<td><input type= "hidden" name="fidFruta"   value="' . $unRegistro['idFruta'] . '">';
                echo '    <input type= "text" name="fnombreFruta"   value="' . $unRegistro['nombreFruta'] . '"></td>';
                echo '<td><input type= "number" name="fidTipofruta"   value="' . $unRegistro['idTipofruta'] . '"></td>';
                echo '<td><input type= "number" name="fpesoFruta"   value="' . $unRegistro['pesoFruta'] . '"></td>';
                echo '<td><input type= "text" name="fcolorFruta"   value="' . $unRegistro['colorFruta'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarFruta" action="../Controlador/ControladorFruta.php" method="post">
                    <td><input type="hidden" name="fidFruta" value="0">
                        <input type="text" name="fnombreFruta"></td>
                    <td><input type="number" name="fidTipofruta"></td>
                    <td><input type="number" name="fpesoFruta"></td>
                    <td><input type="text" name="fcolorFruta"></td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaFruta);
    $objetoConexion->desconectar($conexion);
    ?>

    
</body>
</html>