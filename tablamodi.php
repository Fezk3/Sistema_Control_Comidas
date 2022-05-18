<div class="container mt-1">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 ">
            <table class="table table-success table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">DIA</th>
                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody id="info">
                    <?php
                    require_once "procesosphp/conexion.php";
                    $query = "SELECT DIA FROM COMIDAS";
                    $consulta = $mysqli->query($query);
                    if ($consulta->num_rows >= 1) {
                        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                            if ($fila['DIA'] == "L") {
                                $dia = "LUNES";
                            } elseif ($fila['DIA'] == "K") {
                                $dia = "MARTES";
                            } elseif ($fila['DIA'] == "M") {
                                $dia = "MIÉRCOLES";
                            } elseif ($fila['DIA'] == "J") {
                                $dia = "JUEVES";
                            } elseif ($fila['DIA'] == "V") {
                                $dia = "VIERNES";
                            }
                            echo "<tr>
                                <td class='text-center op p-1'>" . $dia . "</td>
                                <td class='text-center op'>
                                     <a class='btn btn-primary editar' href='./editar_dia.php?DIA=" . $fila['DIA'] . "'>Actualizar Registro</a>
                                </td>
                                <td class='text-center op'>
                                     <a class='btn btn-danger  editar' href=procesosphp/eliminardia.php?DIA=" . $fila['DIA'] . ">Eliminar Registro</a>
                                 </td>
                              </tr>";
                        }
                        echo "</tbody>
                        </table>";
                    } else {
                        echo "<h1 text-center>Error en la base de datos</h1>";
                    }

                    ?>
        </div>
    </div>
</div>