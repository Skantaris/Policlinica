
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
<body >
<!--superior de la pagina-->
<header class="d-flex align-items-center justify-content-between p-5 bg-MedioBlanco">
    <!-- admin -->
    <div class="logo">
        <a href="home-admin"><img src="Logo/Logo.svg" alt="Policlínicas
            de la CSS"></a>
    </div>
    <div class="d-flex align-items-center me-5 ">
        <ul class="nav nav-pills me-5">
            <li class="nav-item flex-wrap dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="edicion">
                    <h4>Edición</h4>
                </button>
                <ul class="dropdown-menu" aria-labelledby="edicion">
                    <li>
                        <a class="dropdown-item" href="addMedico">Editar Medicos</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="addEspec">Editar Especialidades</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="misClinicas">Editar Clinica</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/">Cerrar Sesion</a>
                    </li>
                </ul>
            </li>
        </ul>
        <i class="bi bi-person-circle grande"></i>
    </div>
</header>
<div class="container pt-5 medio">
    <div class="d-flex flex-row justify-content-between pb-5">
        <h1 class="fw-bold ">Medicos</h1>

        <!-- Button trigger modal -->
        <button class=" btn btn-pri px-4 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#cancelar">
            <div class="pe-4">Agregar nuevo medico</div>
            <i class="bi bi-plus-lg fs-3"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="cancelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-MedioBlanco">
                        <h1 class="modal-title disable" id="exampleModalLabel">Llene los siguientes campos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container">
                        <form action="" method="POST">
                            <div class="d-flex flex-column container-fluid mb-5">
                                <label for="" class="form-label d-flex container-fluid">Cedula del usuario:</label>
                                <select name = "ced" id = "ced">
                                    <?php
                                    echo $modelo->MostrarCedula();
                                    ?>
                                </select>

                            </div>
                            <div class="d-flex flex-column container-fluid mb-5">
                                <label for="especialidad" class="form-label d-flex container-fluid">Seleccione La especialidad del medico: :</label>
                                <select name="espec" id="espec" class="form-select">
                                    <?php
                                    echo $modelo->MostrarEspecialidad();
                                    ?>
                                </select>
                            </div>
                            <div class="pb-3">
                                <p>Seleccione fecha disponible</p>
                                <input type="date" name="fecha" id="fecha">
                            </div>
                            <div class="pb-3">
                                <p>Seleccione la hora deseada</p>
                                <input type="time" name="tiempo" id="tiempo">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="nuevo-medico.php" class="cancel-box btn btn-secondary px-4">Cancelar</a>
                        <button class=" btn btn-secondary px-4" type="submit" name="submit"> Confirmar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row container justify-content-center">
        <div class="">
            <img src="img/doctor.svg" alt="">
        </div>
        <div class="bg-disable px-5">
            <div class="d-flex justify-content-between mt-3">
                <div class="d-flex flex-column pe-5">
                    <?php
                        $modelo->MostrarMedicos();
                    ?>
                </div>
                <!--<div class="d-flex flex-column justify-content-end">
                    <p>26/11/2021 - 10:00 a.m.</p>
                    <p class="d-flex justify-content-end">fecha de creación</p>
                </div>-->
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