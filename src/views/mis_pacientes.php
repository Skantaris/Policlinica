

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Policlínicas de la CSS</title>
</head>

<!--Comienza la informacion de la pagina-->

<body>
<!--superior de la pagina-->
<header class="d-flex align-items-center justify-content-between p-5 bg-MedioBlanco">
    <div class="logo">
        <a href="Inicio.html"><img src="Logo/Logo.svg" alt="Policlínicas
                de la CSS"></a>
    </div>
    <div class="d-flex align-items-center me-5 flex-wrap">
        <ul class="nav nav-pills me-5">
            <li class="nav-item">
                <a class="btn" href="/"> <h4>Cerrar Sesion</h4>
                    <?php
                    $modelo->CerrarSesion();
                    ?>
                </a>
            </li>
            <li class="nav-item flex-wrap">
                <a class="btn" href="crear_cita_med"><h4>Crear cita</h4></a>
            </li>
            <li class="nav-item">
                <a class="btn" href="mis-citas_med"> <h4>Mis citas</h4></a>
            </li>
            <li class="nav-item">
                <a class="btn" href="mis-pacientes"> <h4>Mis Pacientes</h4></a>
            </li>
        </ul>
        <i class="bi bi-person-circle grande"></i>
    </div>




</header>
<!-- cuerpo -->
<div class="container">
    <br>
    <h5>Lista de pacientes: </h5>
</div>
<div class="container d-flex justify-content-between bg-MedioBlanco px-4 py-5 mb-3">
    <div class="d-flex">
        <img class="pe-5" src="iconos/boy.svg" alt="">
        <div class="d-flex align-items-center flex-column ">
            <div class="d-flex container">
                <?php
                    $modelo->MostrarPaciente();
                ?>
            </div>
        </div>
    </div>

</div>


<!--Pie de pagina -->

<footer class="mt-auto py-3 bg-MedioBlanco d-flex justify-content-between footer ">
    <div class=" col">
        <a class="d-flex justify-content-center py-3" href="https://w3.css.gob.pa/"><img src="img/panama caja seguro social 1.png"
                                                                   alt=""></a>
        <h6 class="d-flex justify-content-center blanco">Caja de Seguro Social © 2021. Todos los derechos
            reservados.</h6>
    </div>
    <div class="col align-self-center py-5">
        <ul class="d-flex flex-row list-group list-unstyled justify-content-center">
            <li>
                <a class="a2 col p-4 medio" href="">
                    <i class="bi bi-facebook grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="">
                    <i class="bi bi-instagram grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="">
                    <i class="bi bi-pinterest grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="">
                    <i class="bi bi-twitter grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio " href="">
                    <i class="bi bi-youtube grande"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
