<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/


function validarDatosRegistro() {
    // Recuperar datos Enviados desde formulario_nuevo_equipo.php
    $datos = Array();
    $datos[0] = (isset($_REQUEST['nombre']))?
            $_REQUEST['nombre']:"";
    $datos[0] = limpiar($datos[0]);
    $datos[1] = (isset($_REQUEST['profesor']))?
            $_REQUEST['profesor']:"";
    $datos[2] = (isset($_REQUEST['nota']))?
            $_REQUEST['nota']:"";

    
    //-----validar ---- //
    $errores = Array();
    $errores[0] = !validarNombre($datos[0]);
    $errores[1] = !validarProfesor($datos[1]);
    $errores[2] = !validarNota($datos[2]);

    // ----- Asignar a variables de Sesión ----//
    $_SESSION['datos'] = $datos;
    $_SESSION['errores'] = $errores;
    $_SESSION['hayErrores'] =
            ($errores[0] || $errores[1]
             || $errores [2]);
    
}


// PRINCIPAL //
validarDatosRegistro();
if ($_SESSION['hayErrores']) {
    $url = "formulario_nueva_asignatura.php";
    header('Location:'.$url);
} else {
    $db = conectaBd();
    $nombre = $_SESSION['datos'][0];
    $profesor = $_SESSION['datos'][1];
    $nota = $_SESSION['datos'][2];
    $consulta = "INSERT INTO asignatura
(nombre, profesor, nota)
VALUES (:nombre, :profesor, :nota)";
    $resultado = $db->prepare($consulta);
    if ($resultado->execute(array(":nombre" => $nombre, ":profesor" => $profesor, ":nota" => $nota))) {
        unset($_SESSION['datos']);
        unset($_SESSION['errores']);
        unset($_SESSION['hayErrores']);
        $url = "listado_asignaturas.php";
        header('Location:'.$url);
    } else {
        print "<p>Error al crear el registro.</p>\n";
    }

    $db = null;

}
?>