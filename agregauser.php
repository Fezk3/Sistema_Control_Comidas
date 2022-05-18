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
    <title>Agregar Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styleagrega.css">
</head>

<body>

    <header>
        <?php include_once("navbar.php"); ?>
    </header>

    <main>

        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <h1 class="text-center text-black">Ingrese la informacion del nuevo Administrador</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5 ">
            <div class="row ">
                <form action="./procesosphp/agregaruser.php" class="needs-validation" method="POST" novalidate>

                    <div class="col-12 col-md-8 m-auto">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">CEDULA</label>
                            <input required class="form-control" name="CEDULA" id="exampleFormControlInput1" />
                            <div class="invalid-feedback">
                                Ingrese una Cedula
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">NOMBRE</label>
                            <input required class="form-control" id="exampleFormControlInput1" name="NOMBRE" />
                            <div class="invalid-feedback">
                                Ingrese un Nombre
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">APELLIDO</label>
                            <input required class="form-control" name="APELLIDO" id="exampleFormControlInput1" />
                            <div class="invalid-feedback">
                                Ingrese un Apellido
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">CONTRASEÑA</label>
                            <input required type="password" name="CONTRASEÑA" class="form-control" id="exampleFormControlInput1" />
                            <div class="invalid-feedback">
                                Ingrese una Contraseña
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col-5 col-md-3 text-center">
                    <button class="btn btn-success btn-block btn-lg mt-4" style="width: 100%;">Enviar</button>
                </div>
            </div>

            </form>

        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include_once("validaform.php"); ?>

</body>

</html>