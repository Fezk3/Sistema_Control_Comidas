<?php

session_start();

require_once "conexion.php";
$cedula = $_POST['CEDULA'];
$nombre = $_POST['NOMBRE'];
$apellido = $_POST['APELLIDO'];
$contrasenia = md5($_POST['CONTRASEÑA']);
$tipo = 2;
$query = "INSERT INTO ADMINISTRADORES(CEDULA, PASSWORD, TIPO, NOMBRE, APELLIDOS) VALUES ('$cedula', '$contrasenia','$tipo','$nombre', '$apellido')";
if ($mysqli->query($query)) {

    $_SESSION['mensaje1'] = "Se ha agregardo el usuario: " . $nombre . " " . $apellido . ".";

    header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
} else {

    $_SESSION['mensaje2'] = "Error, no se ha podido agregar el usuario: " . $nombre . ".";

    header('Location: http://34.207.191.253/sistema_colegio_humanista/menu_admin.php');
}
