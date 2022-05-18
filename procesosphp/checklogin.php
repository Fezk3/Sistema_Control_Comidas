<?php
session_start();

if (empty($_POST)) {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/index.php');
    exit();
}

$host_db = "db-progra4-2022.cmalncukfeas.us-east-1.rds.amazonaws.com";
$user_db = "root";
$pass_db = "root123456789";
$name_db = "colegio_humanista";
$table_db = "ADMINISTRADORES";

$conexion = new mysqli($host_db, $user_db, $pass_db, $name_db);

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

$userID = $_POST['cedula'];
$password = md5($_POST['contrasenna']);

$sql = "SELECT * FROM $table_db WHERE CEDULA = '$userID'";

$result = $conexion->query($sql);

if ($result->num_rows <= 0) {
    echo "Username o Password incorrectos. <br>";
    echo "<a href='../login.php'>VOLVER A INTENTARLO</a> ";
    exit();
}
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($password == $row['PASSWORD']) {

    $_SESSION['loggedin'] = true;
    $_SESSION['tipo_usuario'] = $row['TIPO'];
    $_SESSION['username'] = $userID;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);


    $_SESSION['mensajeBienvenida'] = "Bienvenido de nuevo " . $row['NOMBRE'];;

    header('Location: http://34.207.191.253/sistema_colegio_humanista/index.php');
    exit();
} else {
    echo "Username o Password incorrectos. <br>";
    echo "<a href='../login.php'>VOLVER A INTENTARLO</a> ";
}
mysqli_close($conexion);
