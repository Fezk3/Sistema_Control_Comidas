<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "Esta página es solo para usuarios registrados. <br> <br>";
    echo "<a href='./index.php>LOGIN</a>";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/stylepagedicion.css">
</head>

<body>

    <header>
        <?php include_once("navbar.php"); ?>
    </header>

    <?php
    if (isset($_SESSION['mensaje3'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje3'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje3']);
    }
    if (isset($_SESSION['mensaje4'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje4'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje4']);
    }
    if (isset($_SESSION['mensaje11'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje11'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje11']);
    }
    if (isset($_SESSION['mensaje12'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensaje12'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['mensaje12']);
    }
    ?>
    <main>
        <div class="container mt-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <h1 class="text-center text-black"> <span class="logomenu"><img class="logoedi" src="imgs/edit.png" alt="logo edicion"></span>Edicion del Menu</h1>
                </div>
            </div>
        </div>

        <?php
        require_once "./procesosphp/conexion.php";
        require_once "tablamodi.php";
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>