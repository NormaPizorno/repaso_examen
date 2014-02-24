<?php
session_start();
require_once 'funciones.php';
    // Estructura: campos del formulario
$_SESSION['datos'] = (isset($_SESSION['datos']))?
            $_SESSION['datos']:Array('','','');
$_SESSION['errores'] = (isset($_SESSION['errores']))?
            $_SESSION['errores']:Array(FALSE,FALSE,FALSE);
$_SESSION['hayErrores'] = (isset($_SESSION['hayErrores']))?
            $_SESSION['hayErrores']:FALSE;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>TODO supply a title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
</head>
<body>
<div>TODO write content</div>
<form action="grabar_nueva_asignatura.php" method="GET">
<div>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['datos'][0];?>"/>
    <?php
         if ($_SESSION['errores'][0]) {
            echo "<div class 'error'>".MSG_ERR_NOMBRE."</div>";
         }
    ?>
<div>Profesor: <input type="text" name="profesor" value="<?php echo $_SESSION['datos'][1];?>"/>
    <?php
         if ($_SESSION['errores'][1]) {
            echo "<div class 'error'>".MSG_ERR_PROFESOR."</div>";
         }
    ?>
<div>Nota: <input type="text" name="nota" value="<?php echo $_SESSION['datos'][2];?>"/>
    <?php
         if ($_SESSION['errores'][2]) {
            echo "<div class 'error'>".MSG_ERR_NOTA."</div>";
         }
    ?>
<input type="submit" value="Enviar" /></p>
</form>
</body>
</html>