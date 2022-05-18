<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "Esta página es solo para usuarios registrados. <br> <br>";
    echo "<a href='./index.php'>LOGIN</a>";
    exit();
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "Su sesión ha caducado";
    echo "<a href='./index.php'>NECESITA HACER LOGIN</a>";
    exit();
}


if (empty($_GET)) {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
    exit();
} else {
    $diaSeleccionado = $_GET['diaS'];
    $desayuno = $_GET['desayuno'];
    $almuerzo = $_GET['almuerzo'];
    $merienda = $_GET['merienda'];
}

if ($desayuno == "" && $almuerzo == "" && $merienda == "") {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
    exit();
}

echo $diaSeleccionado . '<br>';
echo $desayuno . '<br>';
echo $almuerzo . '<br>';
echo $merienda . '<br>';


require_once "procesosphp/conexion.php";
$query = "UPDATE COMIDAS SET DESAYUNO = '$desayuno', ALMUERZO = '$almuerzo', MERIENDA = '$merienda'  WHERE DIA = '$diaSeleccionado'";

if ($diaSeleccionado == "L") {
    $dia = "Lunes";
} elseif ($diaSeleccionado == "K") {
    $dia = "Martes";
} elseif ($diaSeleccionado == "M") {
    $dia = "Miercoles";
} elseif ($diaSeleccionado == "J") {
    $dia = "Jueves";
} elseif ($diaSeleccionado == "V") {
    $dia = "Viernes";
}

if ($mysqli->query($query)) {
    $_SESSION['mensaje11'] = "Menu del dia: " . $dia . " actualizado.";
    header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
} else {
    $_SESSION['mensaje12'] = "No se ha podido actualizar el menu del dia: " . $dia . ".";
    header('Location: http://34.207.191.253/sistema_colegio_humanista/menuedicion.php');
}
