<?php
session_start();
require_once './procesosphp/reseteo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema para manejo de comidas</title>
  <link rel="stylesheet" href="css/normalice.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/stylepag1.css" />
</head>

<body>
  <header>
    <?php include_once("navbar.php"); ?>
  </header>

  <main>

    <?php

    if (isset($_SESSION['mensajeBienvenida'])) {
        ?>
        <div class="alert alert-primary alert-dismissible fade show mt-1" role="alert">
            <strong><?php echo $_SESSION['mensajeBienvenida'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['mensajeBienvenida']);
    }

    if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == 1 && isset($_SESSION['loggedin'])) {
      echo "    <div class='container-fluid mt-2'>
      <div class='row d-flex flex-row-reverse'>
        <div class='col-5 col-md-2 col-lg-1'>
        <a href='./menu_admin.php' class='btn btn-primary'>Menú Admin</a>
        </div>
      </div>
    </div>";
    } else if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == 2 && isset($_SESSION['loggedin'])) {
      echo "    <div class='container-fluid mt-2'>
      <div class='row d-flex flex-row-reverse'>
        <div class='col-4 col-md-2 col-lg-1'>
              <a href='./consulta_est.php' class='btn btn-primary'>Consultar Estudiante</a>
        </div>
        <div class='col-3 col-md-2 col-lg-1'>
        <a href='./menuedicion.php' class='btn btn-primary'>Editar Menú</a>

      </div>
    </div>";
    }
    ?>
    <div class="container mt-3 md-mt-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
          <h1 class="text-center text-black"> <span class="logomenu"><img class="logomenu" src="imgs/menu.png" alt="logo menu"></span> MENÚ SEMANAL</h1>
        </div>
      </div>
    </div>


    <?php include_once("tablaindex.php"); ?>


  </main>

  <!-- Bootstrap jS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>