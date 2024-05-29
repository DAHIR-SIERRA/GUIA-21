
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="uft-8">
    <title>Formulario de Generos </title>
</head>

<body>
    <header>
        <h1>Formulario Generos</h1>
    </header>
    <table border="1">
        <tbody>
            <tr>
                <th scope="" col> Descripcion Genero </th>
                
                
            </tr>
            <?php
            include_once("../Modelo/Conexion.php");
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../Modelo/Generos.php");
            $objetoGenero = new Generos($conexion,0,'nombre');
            $listaGenero = $objetoGenero->Listar(0);
            while ($unRegistro = mysqli_fetch_array($listaGenero)) {
                echo '<tr><form id ="fModificarGenero' . $unRegistro["idGenero"] . '" action="../Controlador/ControladorGeneros.php" method="post">';
                echo '<td><input type= "hidden" name="fidGenero"   value="' . $unRegistro['idGenero'] . '">';
                echo '    <input type= "text" name="fdescripcionGenero"   value="' . $unRegistro['descripcionGenero'] . '"></td>';
                echo '<td><button type= "submit" name="fenviar" value= "Modificar">Actualizar</button> 
                            <button type = "submit" name="fenviar" value = "Eliminar">Eliminar</button></td>';
                echo '</form></tr>';
            }
            ?>
            <tr>
                <form id="fIngresarCliente" action="../Controlador/ControladorGeneros.php" method="post">
                    <td><input type="hidden" name="fidGenero" value="0">
                        <input type="text" name="fdescripcionGenero">
                    </td>
                    <td><button type="submit" name="fenviar" value="Ingresar">insertar</button>
                        <button type="reset" name="fenviar" value="Limpiar">Limpiar</button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaGenero);
    $objetoConexion->desconectar($conexion);
    ?>


</body>
<html>