<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Personas</title>
</head>
<body>
    <h1>Español Wilber chacón</h1>
    <h2>Hola 3</h2>

<table border="1">
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>edad</th>
        <th>telefono</th>
        <th>genero</th>
        <th>fecha de nacimiento</th>
    </tr>

    <?php
    
    header('Content-Type: text/html; charset=UTF-8');
    //header('Content-Type: text/html; charset=ISO-8859-1');
    include("./conexion.php");
    $conexion->set_charset("utf8");
    $sql = "SELECT id_persona, nombre_persona, edad_persona, telefono_persona, sexo_persona, fecha_nac FROM persona";
    $ejecutar = mysqli_query($conexion, $sql);
    while ($fila=mysqli_fetch_array($ejecutar)) {
        
    ?>

    <tr>
        <td><?php echo $fila[0] ?></td>
        <td><?php echo $fila[1] ?></td>
        <td><?php echo $fila[2] ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo $fila[4] ?></td>
        <td><?php echo $fila[5] ?></td>
    </tr>
    <?php } ?>
</table>

<a href="./excel2.php">Generar Excel</a>
    
</body>
</html>
