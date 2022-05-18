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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistema para manejo de comidas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/styleconsul.css"/>
</head>

<body>
<header>
    <?php include_once("navbar.php"); ?>
</header>

<?php
if (isset($_SESSION['mensajePositivo'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
        <strong><?php echo $_SESSION['mensajePositivo'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['mensajePositivo']);

} else if (isset($_SESSION['mensajeNegativo'])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <strong><?php echo $_SESSION['mensajeNegativo'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['mensajeNegativo']);

} else if (isset($_SESSION['mensajeYaComio'])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <strong><?php echo $_SESSION['mensajeYaComio'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['mensajeYaComio']);

} else if (isset($_SESSION['mensajeTardio'])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <strong><?php echo $_SESSION['mensajeTardio'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['mensajeTardio']);

} else if (isset($_SESSION['mensajeNoExiste'])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <strong><?php echo $_SESSION['mensajeNoExiste'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['mensajeNoExiste']);
}
?>

<main>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="text-center text-black"><span class="logomenu"><img class="logomenu" src="imgs/request.png"
                                                                               alt="logo menu"></span> Consultar
                    Estudiante</h1>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row ">
                <form action="./procesosphp/consulta.php" class="needs-validation" method="POST" novalidate>

                    <div class="col-12 col-md-8 m-auto mt-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">Ingrese la Cedula del
                                Estudiante</label>
                            <input required class="form-control" type="text" name="ced" id="exampleFormControlInput1"/>
                            <div class="invalid-feedback">
                                Ingrese un numero de cedula
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center">
                            <div class="col-7 col-md-6 text-center">
                                <button class="btn btn-success btn-block btn-lg mt-4" style="width: 100%;">CONSULTAR
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

</main>

<!-- Bootstrap jS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<?php include_once("validaform.php"); ?>

</body>

</html>