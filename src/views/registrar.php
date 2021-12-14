<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/personalizar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Registrar usuario</title>
</head>
<body>
    <header class="bg-MedioBlanco ">
        <h1 class="text-uppercase header-reg fw-bold disable">REGISTRAR USUARIO</h1>
    </header>
    <div>
        <form action="" method="POST" class="d-flex flex-column justify-content-center">
            <div class="row p-5">
                <div class="container col d-flex align-self-start me-sm-3">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" name="correo" id="correo">
                        </div>
                        <div class="mb-3 row">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="La constraseña debe tener minimo 8 caracter, un número, una letra mayúscula, una minuscula y caracter especiales">
                        </div>
                    </div>
                </div>
    
                <div class="container col">
                    <div class="col">
                        <div class="row mb-3">
                            <div class="col d-flex flex-column bd-highligh">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input class="d-flex flex-column bd-highlight" type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                            <div class="col d-flex flex-column bd-highligh">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input class="d-flex flex-column bd-highlight" type="text" class="form-control" name="apellido" id="apellido">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" name="cedula" id="cedula">
                        </div>
                            <div class="mb-3 row">
                            <label for="dia" class="form-label">Fecha de nacimiento</label>
                            <div class="col-md-1 me-2">
                                <div class="row"><input class="form-control" type="text" name="dia" id="dia" placeholder="Día"></div>
                            </div>
                            <div class="col-md-1 me-2">
                                <div class="row">
                                    <select class="form-select" name="mes" id="mes" placeholder="mes">
                                        <option value="enero">enero</option>
                                        <option value="febrero">febrero</option>
                                        <option value="marzo">marzo</option>
                                        <option value="abril">abril</option>
                                        <option value="mayo">mayo</option>
                                        <option value="junio">junio</option>
                                        <option value="julio">julio</option>
                                        <option value="agosto">agosto</option>
                                        <option value="septiembre">septiembre</option>
                                        <option value="octubre">octubre</option>
                                        <option value="noviembre">noviembre</option>
                                        <option value="diciembre">diciembre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 me-2">
                                <div class="row"><input class="form-control" type="text" name="anio" id="anio" placeholder="año"></div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-secondary px-4 btn-lg gap-3 mb-3" type="submit" name="submit">Registrar usuario</button>
            </div>
            <div class="d-flex justify-content-center">
                <p>¿Ya tiene cuenta registrada? <a href="/">Iniciar sesión</a></p>
            </div>
        </form>
    </div>
    <footer class="row">
        <img class="d-flex bd-highligh" src="img/footer.svg" alt="">
    </footer>
</body>
</html>