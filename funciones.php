<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

// Constantes


define('MSG_ERR_NOTA', "Error Nota...");
define('MSG_ERR_NOMBRE', "Error Nombre...");
define('MSG_ERR_PROFESOR', "Error Profesor...");

// Funciones de validación

function limpiar($valor) {
    return strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1")));
}

function validarNombre($valor) {
    $valor = limpiar($valor);
    if (strlen($valor)>0 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
}


function validarProfesor($valor) {
    $valor = limpiar($valor);
    if (strlen($valor)>0 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
}
function validarNota($valor) {
    
    if (is_numeric($valor)
            && ($valor>=0 && $valor<=10)){
        return TRUE;
    } else {
        return FALSE;
    }
}



