<?php
$queryCountD = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 0;";
$resultadoCountD = $mysqli->query($queryCountD);
while ($rowCountD = $resultadoCountD->fetch_assoc()) {
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountD['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "DESAYUNO", '1', '1', 'C');
}
$queryCountA = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 1;";
$resultadoCountA = $mysqli->query($queryCountA);
while ($rowCountA = $resultadoCountA->fetch_assoc()) {
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountA['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "ALMUERZO", '1', '1', 'C');
}
$queryCountM = "SELECT count(*) FROM REGISTRO_COMIDAS WHERE DIA = '{$diaSQL}' and TIPO_COMIDA = 2;";
$resultadoCountM = $mysqli->query($queryCountM);
while ($rowCountM = $resultadoCountM->fetch_assoc()) {
    $pdf->Cell('60', '10', utf8_decode($dia), '1', '0', 'C');
    $pdf->Cell('40', '10', $rowCountM['count(*)'], '1', '0', 'C');
    $pdf->Cell('80', '10', "MERIENDA", '1', '1', 'C');
}
?>