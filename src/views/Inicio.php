
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
            <img src="Logo/Logo.svg" alt="Policlínicas 
            de la CSS">
        </div>
        <div class="">
            <a href="registrarse" class="btn">Registrar Cuenta</a>
            <!-- trigget de ingresar cuenta -->
            <button class="btn btn-pri btn-lg" data-bs-toggle="modal" data-bs-target="#iniciar">Iniciar Sesión</button>
        </div>
        <!-- Modal iniciar sesion-->
        <div class="modal fade" id="iniciar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex flex-column pb-5">
                    <h2 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h2>
                    <p>¿No tienes cuenta?<a href="registrarse">registrate aquí</a></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                <div class="modal-body container-fluid pb-3">
                    <i class="bi bi-person"></i>
                    <label for="cedula" class="form-label">Cédula</label>
                    <input class="d-flex flex-column container-fluid" type="text" name="cedula" id="cedula">
                </div>
                <div class="modal-body container-fluid pb-3">
                    <i class="bi bi-lock"></i>
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input class="d-flex flex-column container-fluid" type="password" name="contrasena" id="contrasena">
                </div>
                <div class="modal-footer container-fluid">
                <button type="entrar" class="btn btn-primary container-fluid" name="entrar" >Entrar</button>
                </div>
            </div>
            </div>
        </div>
        </form>
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