
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

<body>
<!--superior de la pagina-->
<header class="d-flex align-items-center justify-content-between p-5 bg-MedioBlanco">

    <!-- Paciente -->
    <div class="logo">
        <a href="home-paciente"><img src="Logo/Logo.svg" alt="Policlínicas
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
                <a class="btn" href="crear_cita"><h4>Crear cita</h4></a>
            </li>
            <li class="nav-item">
                <a class="btn" href="citas"> <h4>Mis citas</h4></a>
            </li>
        </ul>
        <i class="bi bi-person-circle grande"></i>
        <br>

    </div>

</header>

<div class="container-xxl">
    <div class="d-flex flex-row justify-content-between p-5">
        <div class="texto">
            <h1 class="fs-1 fw-bold">Salud</h1>
            <h3>El que tiene salud, tiene esperanza; <br> el que tiene esperanza, lo tiene todo</h3>
        </div>
        <div class="imagen">
            <img src="iconos/medicine.svg" alt="imagenMedicina">
        </div>
    </div>
</div>

<div class="d-flex flex-column p-5 border border-primary">
    <h1 class="fs-1 fw-bold">Creacion cita</h1>
    <br><br>
    <div class="container-xxl">
        <h3 class=" text-center">Para creación de cita sigue los siguiente pasos</h3>
        <br><br>
        <div class="row text-center">
            <div class="col">
                <img src="img/1.png" alt="1">
                <div class="">
                    <h4>Para creación de cita sigue los siguiente pasos</h4>
                </div>
            </div>
            <div class="col">
                <img src="img/2.png" alt="1">
                <div class="">
                    <h4>Ir a  Crear Cita</h4>
                </div>
            </div>
            <div class="col">
                <img src="img/3.png" alt="1">
                <div class="">
                    <h4>Rellenar campos</h4>
                </div>
            </div>
        </div>

    </div>
</div>
<!--Pie de pagina -->
<footer class="bg-MedioBlanco d-flex flex-row justify-content-between ">
    <div class=" col">
        <a class="d-flex justify-content-center py-3" href="https://w3.css.gob.pa/"><img src="img/panama caja seguro social 1.png" alt=""></a>
        <h6 class="d-flex justify-content-center blanco">Caja de Seguro Social © 2021. Todos los derechos reservados.</h6>
    </div>
    <div class="col align-self-center py-5">
        <ul class="d-flex flex-row list-group list-unstyled justify-content-center">
            <li>
                <a class="a2 col p-4 medio" href="https://www.facebook.com/csspanama/">
                    <i class="bi bi-facebook grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="https://www.instagram.com/csspanama/">
                    <i class="bi bi-instagram grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="https://www.pinterest.com/csspty/">
                    <i class="bi bi-pinterest grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio" href="https://twitter.com/CSSPanama">
                    <i class="bi bi-twitter grande"></i>
                </a>
            </li>
            <li>
                <a class="a2 col p-4 medio " href="https://www.youtube.com/channel/UCZdS9JCK1c3guohAnmR1eiA">
                    <i class="bi bi-youtube grande"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
