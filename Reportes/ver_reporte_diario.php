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
    echo "<a href='./index.php'>NECESITA HACER LOGIN</a>";
    exit();
}

if ($_SESSION['tipo_usuario'] != 1) {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/index.php');
    exit();
}

include "./plantilla.php";
require '../procesosphp/conexion.php';

date_default_timezone_set('America/Costa_Rica');

$hoy = date('N');

if ($hoy == 1) {
    $diaSQL = 'L';
    $dia = "LUNES";
} elseif ($hoy == 2) {
    $diaSQL = 'K';
    $dia = "MARTES";
} elseif ($hoy == 3) {
    $diaSQL = 'M';
    $dia = "MIÉRCOLES";
} elseif ($hoy == 4) {
    $diaSQL = 'J';
    $dia = "JUEVES";
} elseif ($hoy == 5) {
    $diaSQL = 'V';
    $dia = "VIERNES";
} elseif ($hoy == 6) {
    $diaSQL = 'S';
    $dia = "SÁBADO";
} elseif ($hoy == 7) {
    $diaSQL = 'D';
    $dia = "DOMINGO";
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', '12');
$pdf->Ln(5);
$pdf->Cell('60', '10', 'DIA', '1', '0', 'C', '1');
$pdf->Cell('40', '10', 'CANTIDAD', '1', '0', 'C', '1');
$pdf->Cell('80', '10', 'COMIDA', '1', '1', 'C', '1');

$pdf->SetFont('Arial', '', '10');

$cant = 0;

$queryCountD = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 0;";
$resultadoCountD = $mysqli->query($queryCountD);
while ($rowCountD = $resultadoCountD->fetch_assoc()) {
    $cant += $rowCountD['count(*)'];
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountD['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "DESAYUNO", '1', '1', 'C');
}

$queryCountA = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 1;";
$resultadoCountA = $mysqli->query($queryCountA);
while ($rowCountA = $resultadoCountA->fetch_assoc()) {
    $cant += $rowCountA['count(*)'];
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountA['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "ALMUERZO", '1', '1', 'C');
}

$queryCountM = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 2;";
$resultadoCountM = $mysqli->query($queryCountM);
while ($rowCountM = $resultadoCountM->fetch_assoc()) {
    $cant += $rowCountM['count(*)'];
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountM['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "MERIENDA", '1', '1', 'C');
}

$pdf->Ln();
$pdf->SetFont('Arial', 'B', '12');
$pdf->Write('5', "El total de comidas del dia {$dia} fueron: " . $cant);


$pdf->Output();
/*$pdf->Output('F', './Reportes/Reporte '. date('Y-m-d') . " - ". date('h-i-s A') .'.pdf');*/
?>
