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
    <link rel="stylesheet" type="text/css" href="./css/styleLogin.css">
</head>

<body>
    <header>
        <?php
        include_once './navbar.php';
        ?>
    </header>

    <main class="container mt-3">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="mb-3 mt-5">
                    <h1 class="text-center">INICIO DE SESIÓN</h1>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row ">
                <form action="./procesosphp/checklogin.php" class="needs-validation" method="POST" novalidate>

                    <div class="col-12 col-md-8 m-auto">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">CEDULA</label>
                            <input required class="form-control" type="text" name="cedula" id="exampleFormControlInput1" />
                            <div class="invalid-feedback">
                                Ingrese un numero de cedula
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label ">CONTRASEÑA</label>
                            <input required type="password" class="form-control" id="exampleFormControlInput1" name="contrasenna" />
                            <div class="invalid-feedback">
                                Ingrese una contraseña
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
        </div>
    </main>

    <!-- Bootstrap jS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <?php include_once("validaform.php"); ?>

</body>

</html>