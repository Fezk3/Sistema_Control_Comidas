<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "Esta página es solo para usuarios registrados. <br> <br>";
    echo "<a href='../index.php'>LOGIN</a>";
    exit();
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();

    echo "Su sesión ha caducado";
    echo "<a href='../index.php'>NECESITA HACER LOGIN</a>";
    exit();
}

if (isset($_POST['ced'])) {

    date_default_timezone_set('America/Costa_Rica');
    $horaLocal = date("U");
    $desayuno_inicio = strtotime("07:00:00");
    $desayuno_fin = strtotime("07:30:00");
    $almuerzo_inicio = strtotime("12:10:00");
    $almuerzo_fin = strtotime("13:00:00");
    $merienda_inicio = strtotime("14:30:00");
    $merienda_fin = strtotime("14:40:00");

    if (date('N') == '1') {
        $diaSQL = 'L';
    } elseif (date('N') == '2') {
        $diaSQL = 'K';
    } elseif (date('N') == '3') {
        $diaSQL = 'M';
    } elseif (date('N') == '4') {
        $diaSQL = 'J';
    } elseif (date('N') == '5') {
        $diaSQL = 'V';
    } elseif (date('N') == '6') {
        $diaSQL = 'S';
    } elseif (date('N') == '7') {
        $diaSQL = 'D';
    }

    /*$hora = date("G");*/
    $tardio = false;

    if ((int)$horaLocal > $desayuno_inicio && (int)$horaLocal < $desayuno_fin) {
        $tipoComida = 0;//DESAYUNO

    } elseif ((int)$horaLocal > $almuerzo_inicio && (int)$horaLocal < $almuerzo_fin) {
        $tipoComida = 1;//ALMUERZO

    } elseif ((int)$horaLocal > $merienda_inicio && (int)$horaLocal < $merienda_fin) {
        $tipoComida = 2;//MERIENDA

    } else {
        $tardio = true;
    }

    if ($tardio == true) {
        $_SESSION['mensajeTardio'] = "Solicitud fuera del horario de comidas";
        header('Location: http://34.207.191.253/sistema_colegio_humanista/consulta_est.php');
        exit();
    }

    require './conexion.php';
    $cedula = $_POST['ced'];

    $queryExiste = "SELECT count(*) FROM ESTUDIANTES WHERE CEDULA = {$cedula}";
    $consultaExiste = $mysqli->query($queryExiste);
    $filaExiste = $consultaExiste->fetch_array(MYSQLI_ASSOC);

    if ($filaExiste['count(*)'] > 0) {//SI EL ESTUDIANTE ESTÁ EN LA BD
        $query = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE CEDULA = {$cedula} and DIA = '{$diaSQL}' and TIPO_COMIDA = {$tipoComida}";
        $consulta = $mysqli->query($query);
        $fila = $consulta->fetch_array(MYSQLI_ASSOC);

        if ($fila['count(*)'] > 0) { //ACÁ SE VERIFICA SI YA COMIÓ O ESTÁ FUERA DEL HORARIO DE COMIDAS
            $_SESSION['mensajeYaComio'] = "El estudiante con el id {$cedula} ya comio en este horario";
            header('Location: http://34.207.191.253/sistema_colegio_humanista/consulta_est.php');
            exit();
        } else { //PARA INSERTAR EN LA BASE DE DATOS
            $queryInsert = "INSERT INTO REGISTRO_COMIDAS (CEDULA, TIPO_COMIDA, DIA) VALUES ({$cedula},$tipoComida,'{$diaSQL}');";
            $queryInsert2 = "INSERT INTO REGISTRO_SEMANAL (CEDULA, TIPO_COMIDA, DIA) VALUES ({$cedula},$tipoComida,'{$diaSQL}');";
            $mysqli->query($queryInsert2);

            if ($mysqli->query($queryInsert)) {
                $_SESSION['mensajePositivo'] = "Se ha agregado el registro de la comida del estudiante: " . $cedula;
            } else {
                $_SESSION['mensajeNegativo'] = "No se ha agregado el registro de la comida del estudiante: " . $cedula;
            }
            header('Location: http://34.207.191.253/sistema_colegio_humanista/consulta_est.php');
            exit();
        }
    } else {//SI EL ESTUDIANTE NO ESTÁ EN LA BD
        $_SESSION['mensajeNoExiste'] = "No existe ningún estudiante con la cédula: " . $cedula;
        header('Location: http://34.207.191.253/sistema_colegio_humanista/consulta_est.php');
    }
}
