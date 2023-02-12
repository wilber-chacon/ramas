<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= archivo.xls");
?>

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

    include("./conexion.php");
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