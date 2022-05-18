<div class="container mt-4">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10 ">
            <table class="table table-success table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">CÉDULA</th>
                        <th scope="col">NOMBRE</th>
                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody id="info">
                    <?php
                    require_once "procesosphp/conexion.php";
                    $query = "SELECT CEDULA, NOMBRE FROM ADMINISTRADORES WHERE TIPO = 2";
                    $consulta = $mysqli->query($query);
                    if ($consulta->num_rows >= 1) {
                        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                            echo "<tr>
                                <td class='text-center op '>" . $fila['CEDULA'] . "</td>
                                <td class='text-center op '>" . $fila['NOMBRE'] . "</td>
                                <td class='text-center op'>
                                    <a class='btn btn-primary editar' href='./actuser.php?CEDULA=" . $fila['CEDULA'] . "'>Actualizar</a>
                                </td>
                               <td class='text-center op'>
                                    <a class='btn btn-danger editar' href=procesosphp/eliminauser.php?CEDULA=" . $fila['CEDULA'] . ">Eliminar</a>
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