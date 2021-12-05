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
        <img src="Logo/Logo.svg" alt="Policlínicas
            de la CSS">
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
    <h1 class="fw-bold">MIS CITAS</h1>
    <div class="d-flex flex-row container justify-content-center">
        <div class="">
            <img src="img/esterocopio.svg" alt="">
        </div>
        <div class="bg-disable px-5">
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex flex-column align-items-center pe-5">
                    <?php
                    echo $modelo->MostrarCitaMed();
                    ?>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <a href="reagendar"><button class=" btn btn-secondary px-4 me-2" ">Reagendar cita</button></a>
                <!-- Button trigger modal -->
                <button class=" cancel-box btn btn-secondary px-4" data-bs-toggle="modal" data-bs-target="#cancelar">Cancelar cita</button>

                <!-- Modal -->
                <div class="modal fade" id="cancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-MedioBlanco">
                                <h1 class="modal-title disable" id="exampleModalLabel">Cancelar cita</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Esta seguro que desea cancelar la cita?
                                <br>
                                <form action="" method="POST">
                                    <select name="id" id="">
                                        <?php
                                        $modelo->MostrarCodCita();
                                        ?>
                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button class=" btn btn-secondary px-4" name="submit" type="submit">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
