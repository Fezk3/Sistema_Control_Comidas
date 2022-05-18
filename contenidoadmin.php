<div class="container-fluid mt-3 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <h1 class='text-center text-black mt-5'>GESTIÓN DE ADMINISTRADOR</h1>

            <?php
            require_once "procesosphp/conexion.php";
            include_once("./tablaadmins.php");
            ?>
        </div>
    </div>
    <div class="row  d-flex justify-content-center align-items-center">
        <div class="col-5 text-center">
            <a href="./agregauser.php" class="btn btn-success btn-lg mt-3 mb-5">Agregar Administrador</a>
        </div>
    </div>
</div>