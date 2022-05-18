<?php

session_start();

require_once "conexion.php";

$cedula = $_POST['CEDULA'];
$nombre = $_POST['NOMBRE'];
$apellido = $_POST['APELLIDO'];
$pass1 = $_POST['CONTRASEÑA1']; // Contraseña anterior
$pass2 = $_POST['CONTRASEÑA2']; // Contraseña nueva
echo $pass1;
if ($pass1 != "" && $pass2 != "") {
    $query = "SELECT PASSWORD FROM ADMINISTRADORES WHERE CEDULA = '$cedula'";
    $consulta = $mysqli->query($query);
    $fila = $consulta->fetch_array(MYSQLI_ASSOC);
    $pass2 = md5($pass2);
    $query = "UPDATE ADMINISTRADORES SET NOMBRE = '$nombre', APELLIDOS = '$apellido', PASSWORD = '$pass2', CEDULA = '$cedula' WHERE CEDULA = '$cedula'";
    if ($mysqli->query($query)) {
        $_SESSION['mensaje9'] = "Se ha actualizado el usuario: " . $nombre;
        header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
    } else {
        $_SESSION['mensaje10'] = "Error, no se ha podido actualizar el usuario: " . $nombre;
        header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
    }
}
