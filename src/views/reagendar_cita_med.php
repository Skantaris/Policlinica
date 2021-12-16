
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<header class="d-flex align-items-center justify-content-between p-5 bg-MedioBlanco">
    <div class="logo">
        <a href="home-med"><img src="Logo/Logo.svg" alt="Policlínicas
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

<div class="container pt-5 medio">
    <h1 class="fw-bold">REAGENDAR CITA</h1>
    <div class="container">
        <P>Llene los siguientes campos: </P>
        <form action="" method="POST">
            <div class="pb-3">
                <p>Seleccione la clínica quiere asistir</p>
                <select class="form-select" name="clinic" id="clinic" >
                    <?php
                    $modelo->MostrarClinicaNombre();
                    ?>
                </select>
            </div>
            <div class="pb-3">
                <p>Seleccione la especialidad que se desea consultar</p>
                <select class="form-select" name="espec" id="espec" >
                    <?php
                    $modelo->MostrarEspecialidad();
                    ?>
                </select>
            </div>
            <div class="pb-3">
                <p>Seleccione la fecha deseada</p>
                <input type="date" name="fecha" id="fecha" required>
            </div>
            <div class="pb-3">
                <p>Seleccione la hora deseada</p>
                <input type="time" name="tiempo" id="tiempo" required>
            </div>
            <p>Ingrese numero de la cita</p>
            <select name="id" id="">
                <?php
                $modelo->MostrarCodCitaMed();
                ?>
            </select>
    </div>
    <div class="d-flex flex-row justify-content-end pb-5">
        <!-- Button trigger modal -->
        <button class=" btn btn-secondary px-4" name="submit" type="submit">Confirmar</button>
    </div>
    </form>

</div>

<footer class="bg-MedioBlanco d-flex flex-row justify-content-between ">
    <div class=" col">
        <a class="d-flex justify-content-center py-3" href=""><img src="img/panama caja seguro social 1.png" alt=""></a>
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

