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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/styleadmin.css">
</head>

<body>
    <header>
        <?php include_once("navbar.php"); ?>
    </header>

    <?php
    echo "    <div class='container-fluid mt-2'>
      <div class='row d-flex flex-row-reverse'>
      <div class='col-4 col-md-2 col-lg-1'>
      <a href='./reportes.php' class='btn btn-warning '>Reportes</a>
         </div>
        <div class='col-4 col-md-2 col-lg-1'>
              <a href='./consulta_est.php' class='btn btn-secondary'>Estudiante</a>
        </div>
        <div class='col-4 col-md-2 col-lg-1'>
        <a href='./menuedicion.php' class='btn btn-secondary btn-md'>Edit Menú</a>
      </div>

    </div>";
    ?>

    <?php
    if (isset($_SESSION['mensaje1'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje1'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje1']);
    }
    if (isset($_SESSION['mensaje5'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje5'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje5']);
    }
    if (isset($_SESSION['mensaje9'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje9'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje9']);
    }
    if (isset($_SESSION['mensaje10'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje10'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje10']);
    }
    ?>

    <main>
        <?php
        include_once("./contenidoadmin.php");
        ?>
    </main>

    <!-- Bootstrap jS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>