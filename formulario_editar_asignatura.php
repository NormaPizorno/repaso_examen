<?php
session_start();
require_once 'funciones.php';
require_once 'funciones_bd.php';

    // Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE,FALSE);
$_SESSION['hayErrores'] = (isset($_SESSION['hayErrores']))?
            $_SESSION['hayErrores']:FALSE;
/*
* Cargar de la base de datos
*/
$_SESSION['nombre'] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:$_SESSION['nombre'];

$bd = conectaBd();
$consulta = "SELECT * FROM asignatura WHERE nombre=".$_SESSION['nombre'];
$resultado = $bd->query($consulta);

if (!$resultado) {
       $url = "error.php?msg_error=Error_Consulta_Editar";
       header('Location:'.$url);
} else {
       $registro = $resultado->fetch(); // Cargamos el registro
       if(!$registro) {
           $url = "error.php?msg_error=Error_Registro_Software_inexistente";
           header('Location:'.$url);
       } else {
           $_SESSION['datos'][0] = $registro['nombre'];
           $_SESSION['datos'][1] = $registro['profesor'];
           $_SESSION['datos'][2] = $registro['nota'];
       }
}




?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Editar Software</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div>Editar Software</div>
<form action="grabar_editar_software.php" method="GET">
<div>Titulo: <input type="text" name="titulo"
value="<?php echo $_SESSION['datos'][0]; ?>"/>
</div>
<?php
                if ($_SESSION['errores'][0]) {
                    echo "<div class 'error'>".MSG_ERR_TITULO."</div>";
                }
            ?>
<div>URL <input type="text" name="url"
value="<?php echo $_SESSION['datos'][1]; ?>"/></div>
</div>
<?php
                if ($_SESSION['errores'][1]) {
                    echo "<div class 'error'>".MSG_ERR_URL."</div>";
                }
            ?>
<input type="submit" value="Enviar" />
</form>
</body>
</html>