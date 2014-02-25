<?php require_once 'funciones_bd.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Favoritos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div>Listado de Software</div>
<div><a href="formulario_nueva_asignatura.php">Nueva Asignatura</a></div>
<?php
            $bd = conectaBd();
            $consulta = "SELECT * FROM asignatura";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                
                echo "<th>Profesor</th>";
                echo "<th>Nota</th>";
                
                echo "</tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['Nombre']."</td>";
                    echo "<td>".$registro['Profesor']."</td>";
                    echo "<td>".$registro['Nota']."</td>";
                    
                    $destino="formulario_editar_asignatura.php?nombre=".$registro['Nombre'];
                    
                    echo "<td>";
                    echo "<a href=".$destino.">Editar asignatura</a></td>";
                    echo "</td>";
                    echo "</tr>";
                   
                }
                echo "</table>";
            }
            
            $bd = null;
        ?>
</body>
</html>
