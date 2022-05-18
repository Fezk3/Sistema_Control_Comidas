<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "Esta página es solo para usuarios registrados. <br> <br>";
    echo "<a href='./index.php'>LOGIN</a>";
    exit();
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "Su sesión ha caducado";
    echo "<a href='./index.php'>NECESITA HACER LOGIN</a>";
    exit();
}

if (empty($_GET)) {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/index.php');
    exit();
} else {
    $diaSeleccionado = $_GET['DIA'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema para manejo de comidas</title>
    <link rel="preload" href="css/normalice.css" as="style">
    <link rel="stylesheet" href="css/normalice.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/stylepag1.css" />
</head>

<body>
    <header>
        <?php
        include_once './navbar.php';
        ?>
    </header>

    <main class="container">
        <div class="row d-flex align-items-center justify-content-center alto-100 align-item-center">
            <div class="col-md-12 p-1">
                <div class="card-body justify-content text-center">
                    <div class="mb-3 p-2">
                        <h1 class='mt-4'>DIA SELECCIONADO:
                            <?php
                            if ($diaSeleccionado == "L") {
                                echo "LUNES";
                            } elseif ($diaSeleccionado == "K") {
                                echo "MARTES";
                            } elseif ($diaSeleccionado == "M") {
                                echo "MIÉRCOLES";
                            } elseif ($diaSeleccionado == "J") {
                                echo "JUEVES";
                            } elseif ($diaSeleccionado == "V") {
                                echo "VIERNES";
                            }
                            ?>
                        </h1>
                    </div>

                    <?php
                    require_once "procesosphp/conexion.php";
                    $query = "SELECT DESAYUNO, ALMUERZO, MERIENDA FROM COMIDAS WHERE DIA = '$diaSeleccionado'";
                    $consulta = $mysqli->query($query);
                    $fila = $consulta->fetch_array(MYSQLI_ASSOC);
                    ?>

                    <table class="table table-success table-hover table-bordered mt-5">
                        <thead>
                            <tr>
                                <th scope="col">DESAYUNO</th>
                                <th scope="col">ALMUERZO</th>
                                <th scope="col">MERIENDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $fila['DESAYUNO'] ?></td>
                                <td> <?php echo $fila['ALMUERZO'] ?></td>
                                <td><?php echo $fila['MERIENDA'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
    <div class="container mt-2 ">
        <div class="row ">
            <form action="./modificar_dia.php" class="needs-validation" method="GET" novalidate>
                <div class="col-12 col-md-8 m-auto">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">DESAYUNO</label>
                        <input required class="form-control" name="desayuno" id="exampleFormControlInput1" />
                        <div class="invalid-feedback">
                            Ingrese un Desayuno
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">ALMUERZO</label>
                        <input required class="form-control" id="exampleFormControlInput1" name="almuerzo" />
                        <div class="invalid-feedback">
                            Ingrese un Almuerzo
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">MERIENDA</label>
                        <input required class="form-control" name="merienda" id="exampleFormControlInput1" />
                        <div class="invalid-feedback">
                            Ingrese una Merienda
                        </div>
                    </div>

                    <input type="hidden" name="diaS" value="<?php echo $diaSeleccionado ?>">

                </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-8 col-md-3 text-center mb-5">
                <button class="btn btn-success btn-block btn-lg mt-4" style="width: 100%;">ACTUALIZAR</button>
            </div>
        </div>

        </form>

    </div>

    <!-- Bootstrap jS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include_once("validaform.php"); ?>
</body>

</html>