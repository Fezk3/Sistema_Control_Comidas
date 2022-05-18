<?php

session_start();

require_once "conexion.php";

if (isset($_GET['DIA'])) {
    $dia = $_GET['DIA'];
    $query = "UPDATE COMIDAS SET DESAYUNO = '---', ALMUERZO = '---', MERIENDA = '---' WHERE DIA = '$dia'";
    if ($dia == "L") {
        $dia = "Lunes";
    } elseif ($dia == "K") {
        $dia = "Martes";
    } elseif ($dia == "M") {
        $dia = "Miercoles";
    } elseif ($dia == "J") {
        $dia = "Jueves";
    } elseif ($dia == "V") {
        $dia = "Viernes";
    }
    if ($mysqli->query($query)) {

        $_SESSION['mensaje3'] = "Se ha eliminado la comida del dia: " . $dia . ".";

        header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
    } else {

        $_SESSION['mensaje4'] = "No se ha podido eliminar la comida del dia: " . $dia . ".";

        header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
    }
}
