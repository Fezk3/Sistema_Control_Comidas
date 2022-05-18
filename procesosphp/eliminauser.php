<?php

session_start();

require_once "conexion.php";

if (isset($_GET['CEDULA'])) {
    $cedula = $_GET['CEDULA'];
    echo $cedula;
    $query = "DELETE FROM ADMINISTRADORES WHERE CEDULA = '$cedula'";
    if ($mysqli->query($query)) {

        $_SESSION['mensaje5'] = "Se ha eliminado el admin.";

        header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
    } else {

        $_SESSION['mensaje6'] = "Error, no se ha podido eliminar el admin.";

        header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
    }
}
