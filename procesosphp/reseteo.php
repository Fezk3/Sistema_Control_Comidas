<?php

require_once 'conexion.php';
date_default_timezone_set('America/Costa_Rica');
$hora = date("G");
if ($hora > '23') {
    $query = "TRUNCATE TABLE REGISTRO_COMIDAS";
    $consulta = $mysqli->query($query);

    if (date('N') == '7' or date('N') == '6') {
        $querySemana = "TRUNCATE TABLE REGISTRO_SEMANAL";
        $consultaSemana = $mysqli->query($querySemana);
    }
}
