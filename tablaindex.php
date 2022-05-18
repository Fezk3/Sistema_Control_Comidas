<div class="container mt-4">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 ">
            <table class="table table-success table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">DÍA</th>
                        <th scope="col">DESAYUNO</th>
                        <th scope="col">ALMUERZO</th>
                        <th scope="col">MERIENDA</th>
                    </tr>
                </thead>
                <tbody id="info">
                    <?php
                    require_once "procesosphp/conexion.php";
                    $query = "SELECT DIA, DESAYUNO, ALMUERZO, MERIENDA FROM COMIDAS";
                    $consulta = $mysqli->query($query);
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
                                <td class='dia'>" . $dia . "</td>
                                <td class='comi'>" . $fila['DESAYUNO'] . "</td>
                                <td class='comi'>" . $fila['ALMUERZO'] . "</td>
                                <td class='comi'>" . $fila['MERIENDA'] . "</td>
                             </tr>";
                    }
                    echo "</tbody>
                    </table>";
                    ?>
        </div>
    </div>
</div>