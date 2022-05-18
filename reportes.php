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

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
    <link rel="stylesheet" href="css/normalice.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/stylerepo.css" />
</head>

<body>
    <header>
        <?php
        include_once './navbar.php';
        ?>
    </header>

    <div class='container-fluid mt-2'>
        <div class='row d-flex flex-row-reverse'>
            <div class='col-5 col-md-2 col-lg-1'>
                <a href='./menu_admin.php' class='btn btn-primary'>Menu Admin</a>
            </div>
        </div>
    </div>

    <main>
        <div class="container-fluid mt-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-5">
                    <h1 class='text-center text-black mt-5'> <span class="logomenu"><img class="logomenu mr-1" src="imgs/report.png" alt="logo menu"></span>REPORTES</h1>
                </div>
            </div>
        </div>
        <div class="row mt-5 d-flex justify-content-center align-items-center m-md-5 mb-3">
            <div class="col-8 col-md-6 text-center">
                <a href="Reportes/ver_reporte_diario.php" target="_blank" class="btn btn-success btn-lg mt-3">Generar reporte del día</a>
            </div>
        </div>
        <div class="row mt-5 d-flex justify-content-center align-items-center m-md-5">
            <div class="col-8 col-md-6 text-center">
                <a href="Reportes/ver_reporte_semanal.php" target="_blank" class="btn btn-success btn-lg mt-3">Generar reporte de la semana</a>
            </div>
        </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>