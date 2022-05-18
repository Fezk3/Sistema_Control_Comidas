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

if ($_SESSION['tipo_usuario'] != 1) {
    header('Location: http://34.207.191.253/sistema_colegio_humanista/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styleagrega.css">
</head>

<body>

    <header>
        <?php include_once("navbar.php"); ?>
    </header>

    <?php
    if (isset($_GET['CEDULA'])) {
        require_once "./procesosphp/conexion.php";
        $id = $_GET['CEDULA'];
        $query = "SELECT * FROM ADMINISTRADORES WHERE CEDULA='$id'";
        $consulta1 = $mysqli->query($query);
        $fila = $consulta1->fetch_array(MYSQLI_ASSOC);
        $cedula = $fila['CEDULA'];
        $nombre = $fila['NOMBRE'];
        $apellido = $fila['APELLIDOS'];
        $pass = $fila['PASSWORD'];
        $tipo = $fila['TIPO'];
    } else {
        echo "<h3 class='text-center'>Error, intente nuevamente<?php  ?></h3>
        ";
    }
    ?>

    <main>

        <?php
        if ($tipo == 2) {
            $tipo = "Administrador";
        } else {
            $tipo = "Super Usuario";
        }

        ?>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <h1 class="text-center text-black">Cambie la informacion que sea necesario y presione Actualizar</h1>
                </div>
            </div>
        </div>

        <div class="container mt-1 ">
            <div class="row ">
                <form action="./procesosphp/actualizar.php" class="needs-validation" method="POST" novalidate>

                    <div class="col-12 col-md-8 m-auto">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">CEDULA</label>
                            <input disabled required class="form-control" name="CEDULA" id="exampleFormControlInput1" value="<?php echo $cedula; ?>" />
                        </div>

                        <input hidden required class="form-control" name="CEDULA" id="exampleFormControlInput1" value="<?php echo $cedula; ?>" />

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">NOMBRE</label>
                            <input required class="form-control" id="exampleFormControlInput1" name="NOMBRE" value="<?php echo $nombre; ?>" />
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">APELLIDO</label>
                            <input required class="form-control" name="APELLIDO" id="exampleFormControlInput1" value="<?php echo $apellido; ?>" />
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label ">CONTRASEÑA ANTERIOR</label>
                                    <input required type="password" name="CONTRASEÑA1" class="form-control" id="exampleFormControlInput1" />
                                    <div class="invalid-feedback">
                                        Ingrese una Contraseña
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label ">CONTRASEÑA NUEVA</label>
                                    <input required type="password" name="CONTRASEÑA2" class="form-control" id="exampleFormControlInput1" />
                                    <div class="invalid-feedback">
                                        Ingrese una Contraseña
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-5 col-md-3 text-center">
                <button class="btn btn-success btn-block btn-lg mt-4" style="width: 100%;">Actualizar</button>
            </div>
        </div>

        </form>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include_once("validaform.php"); ?>

</body>

</html>