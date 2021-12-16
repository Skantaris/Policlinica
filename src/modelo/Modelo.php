<?php
namespace Policlinica\modelo;


class Modelo{

    //Conectamos a la base de datos
    public  $connection ;

    public function __construct(){
        $this->connection = mysqli_connect('localhost', 'root', '', 'policlinica');
    }

    //funciones de inicio
    public function insertardatos(){
        if (isset($_POST['submit'])){
            $cedula = $_POST['cedula'];
            $correo = $_POST ['correo'];
            $nombre = $_POST ['nombre'];
            $apellido = $_POST ['apellido'];
            $contrasena = $_POST ['contrasena'];
            $rcontrasena = $_POST['Rcontrasena']; 
            $dia = $_POST ['dia'];
            $mes = $_POST ['mes'];
            $anio = $_POST ['anio'];
            $query="INSERT INTO usuarios(Cedula, Correo, Nombre, Apellido, Contrasena, Dia, Mes, Anio, Rol, Permisos) VALUES ('$cedula', '$correo', '$nombre', '$apellido', '$contrasena', '$dia', '$mes', '$anio', '2', 'admin')";
            $query2 = "INSERT INTO paciente (Cedula) VALUES ('$cedula')";
            $result = mysqli_query($this->connection,$query);
            $result2 = mysqli_query ($this->connection, $query2);
                if ($result and $result2) {
                    echo '<div class="alert alert-primary" role="alert"> ';
                    echo 'Registro realizado con exito';
                    echo '</div>';
                }else {
                    echo '<div class="alert alert-secondary" role="alert"> ';
                    echo 'Fallo al ingresar datos';
                    echo '</div>';
                }
        }
    }


    public function IniciarSesion(){
    if (isset($_POST['entrar'])){
    $cedula = $_POST ['cedula'];
    $contrasena = $_POST ['contrasena'];
    session_start();
    $_SESSION['cedula'] = $cedula;

    $query = "SELECT * FROM usuarios where Cedula = '$cedula' and Contrasena = '$contrasena'";
    $result = mysqli_query($this->connection, $query);

    $record = mysqli_fetch_array($result);

    if ($record['Rol'] == 1){
        header ("Location: admin");
    }else if ($record['Rol'] == 2){
        header ("Location: paciente");
    } else if ($record['Rol'] == 3){
        header("Location: medico");
    } else{
        echo '<div class="alert alert-secondary" role="alert"> ';
        echo 'Los datos que se ingreso es invalido';
        echo '</div>';
    }
    mysqli_free_result($result);

    }

        }

    public function listar(){
        $this->clientes = $this->obtenerUsuarios();
        return $this->clientes;
    }

    public function obtenerUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $result = mysqli_query($this->connection, $query);
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
        return $clientes;
    }

    public function getCedula(){
        $query = "SELECT Cedula FROM usuarios";
        $result = mysqli_query($this->connection, $query);
        while ($row = $result->fetch_assoc()) {
            $cedula[] = $row;
        }
        return $cedula;
    }

    public function CerrarSesion(){
        session_start();
        session_destroy();

    }

    public function MostrarCedula(){
        $query="SELECT * FROM usuarios WHERE Rol = '2'";
        $result = mysqli_query($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla usuarios ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            $cedula = $row['Cedula'];
            echo "<option value='$cedula'>$cedula</option>";
            }
        
    }

    //Funciones de Admin
    public function AgregarMedico (){
        if (isset($_POST ['submit'])){
            $cedula = $_POST ['ced'];
            $especialidad = $_POST ['espec'];
            $fecha_d = $_POST ['fecha'];
            $fecha_h = $_POST ['fecha_h'];
            $time = $_POST ['tiempo_d'];
            $time_h = $_POST ['tiempo_h'];
            $clinic = $_POST ['clinica'];
            $query = "UPDATE usuarios set Rol = '3' where Cedula = '$cedula'";
            $query2 = "INSERT INTO medicos(Cedula_medico, Especialidad, fecha_desde, fecha_hasta, hora_desde, hora_hasta, clinica_labor ) VALUES ('$cedula', '$especialidad', '$fecha_d','$fecha_h', '$time', '$time_h', '$clinic')";
            $query3 = "DELETE FROM paciente WHERE Cedula = '$cedula'";
            $result = mysqli_query($this->connection, $query);
            $result2 = mysqli_query ($this->connection, $query2);
            $result3 = mysqli_query ($this->connection, $query3);
            if ($result and $result2 and $result3){
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Nuevo medico ingresado';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'Fallo al ingresar el nuevo medico';
                echo '</div>';
            }
            mysqli_close($this->connection);
        }
    }

    public function MostrarMedicos(){
        $query="SELECT usuarios.Nombre,medicos.Especialidad, medicos.ID_medico, medicos.fecha_creacion, medicos.fecha_desde,medicos.fecha_hasta, medicos.hora_desde, medicos.hora_hasta, medicos.clinica_labor FROM medicos inner join usuarios ON usuarios.Cedula = medicos.Cedula_medico";
        $result = mysqli_query($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5">';
            echo '<div class="pe-5">';
            echo '<img src="img/doctor.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            $nombre = $row['Nombre'];
            echo "Nombre del medico: $nombre";
            echo "<br>";
            $especialidad = $row['Especialidad'];
            echo "Especialidad del medico: $especialidad";
            echo "<br>";
            $clinica = $row['clinica_labor'];
            echo "Clinica donde labora: $clinica";
            echo "<br>";
            $ID = $row['ID_medico'];
            echo "ID del medico:$ID";
            echo "<br>";
            $fecha = $row ['fecha_creacion'];
            echo "Fecha creada: $fecha";
            echo "<br>";
            $fecha_d = $row ['fecha_desde'];
            echo "Fecha disponible: $fecha_d";
            echo "<br>";
            $tiempo = $row ['fecha_hasta'];
            echo "Hora Disponible: $tiempo";
            echo "<br>";
            echo "<br>";
            echo '</div>';
            echo '</div>';
            }

    }

    public function AgregarEspecialidades(){
        if (isset($_POST['submit'])){
            $nombre = $_POST ['name'];
            $query = "INSERT INTO especialidades(Nombre_Especialidades, Permisos) VALUES ('$nombre', 'admin')";
            $result = mysqli_query($this->connection, $query);
            if ($result){
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Nueva especialidad agregada';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'Fallo al ingresar la especialidad';
                echo '</div>';
            }
        }
    }

    public function MostrarEspecialidad(){
        $query="SELECT * FROM especialidades";
        $result = mysqli_query($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5 align-items-center">';
            echo '<div class="pe-5">';
            echo ' <img src="img/jeringa.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            $nombre = $row['Nombre_Especialidades'];
            echo "<option value='$nombre'>$nombre</option>";
            echo '</div>';
            echo '</div>';
            }
    }

    public function AgregarClinica (){
        if(isset($_POST['submit'])){
            $nombre = $_POST['name'];
            $direccion = $_POST ['dir'];
            $query = "INSERT INTO clinicas(Nombre_clinica, Direccion_clinica, Permisos) VALUES ('$nombre', '$direccion', 'admin')";
            $result = mysqli_query ($this->connection, $query);
            if ($result){
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Nueva clinica ingresada';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'Fallo al ingresar nueva clinica';
                echo '</div>';
            }
        }
    }

    public function MostrarClinicas(){
        $query = "SELECT * FROM clinicas";
        $result = mysqli_query ($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5 align-items-center">';
            echo '<div class="pe-5">';
            echo ' <img src="img/clinica.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            echo "Nombre:";
            $nombre = $row['Nombre_clinica'];
            echo "<span>$nombre</span>";
            echo "<br>";
            echo "Direccion:";
            $direccion = $row['Direccion_clinica'];
            echo "<span>$direccion</span>";
            echo "<br>";
            echo "Fecha creada: ";
            $fecha = $row ['fecha_creacion'];
            echo "<span>$fecha</span>";
            echo "<br>";
            echo '</div>';
            echo '</div>';
            }
    }

    public function MostrarClinicaNombre(){
        $query = "SELECT Nombre_clinica FROM clinicas";
        $result = mysqli_query ($this->connection, $query);
        if (!$result)
            die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            $nombre = $row['Nombre_clinica'];
            echo "<option value='$nombre'>$nombre</option>";

        }
    }

    //Funciones de Paciente
    public function CrearCitaPaciente(){
        if (isset($_POST['submit'])){
            $clinic = $_POST['clinic'];
            $especial = $_POST['espec'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['tiempo'];
            $cedula = $_POST['ced'];
            $query2 = "SELECT ID_medico FROM medicos WHERE Especialidad = '$especial' and '$fecha' between fecha_desde and fecha_hasta and '$hora' between hora_desde and hora_hasta and clinica_labor = '$clinic'";
            $query3 = "SELECT Hora_asignada, Fecha_asignada FROM citas WHERE current_date <= '$fecha'";
            $query4 = "SELECT usuarios.Correo FROM usuarios inner join paciente ON usuarios.Cedula = paciente.Cedula WHERE usuarios.Cedula = '$cedula'";
            $result2 = mysqli_query($this->connection, $query2);
            $result3 = mysqli_query($this->connection, $query3);
            $result4 = mysqli_query($this->connection, $query4);
            $record = mysqli_fetch_array($result2);
            $record2 = mysqli_fetch_array($result4);
           if ($record and $result3 and $record2){
               $query = "INSERT INTO citas(clinica_name,especialidad, Fecha_asignada, Hora_asignada, Permisos, Rol_usuario,Cedula_usuario) VALUES ('$clinic','$especial', '$fecha', '$hora', 'admin', '2', '$cedula')";
               $result = mysqli_query($this->connection, $query);
               $to = $record2['Cedula' == $cedula];
               $subject ="Cita medica";
               $message = "Se creo su cita medica";
               mail($to,$subject,$message);
               echo '<div class="alert alert-primary" role="alert"> ';
               echo 'Cita creada, revise su correo';
               echo '</div>';
           }else {
               echo '<div class="alert alert-secondary" role="alert"> ';
               echo 'No existe el medico o cedula ingresada fue incorrecta';
               echo '</div>';
           }

            }
    }


    public function MostrarCita(){
        $query = "SELECT * FROM citas WHERE Rol_usuario = '2'";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis citas fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5">';
            echo '<div class="pe-5">';
            echo '<img src="img/esterocopio.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            $nombre = $row['clinica_name'];
            echo "Nombre de la clinica: $nombre";
            echo "<br>";
            $cod = $row['Codigo_cita'];
            echo "Numero de cita: $cod";
            echo "<br>";
            $hora = $row['Hora_asignada'];
            echo "Hora de la cita: $hora";
            echo "<br>";
            $fecha = $row['Fecha_asignada'];
            echo "Fecha de la cita: $fecha";
            echo "<br>";
            $espec = $row['especialidad'];
            echo "Especialidad del doctor: $espec";
            echo "<br>";
            $fecha_c = $row['fecha_creacion'];
            echo "Cita creada: $fecha_c";
            echo "<br>";
            echo "<br>";
            echo '</div>';
            echo '</div>';
        }
    }

    public function MostrarCodCita(){
        $query = "SELECT Codigo_cita FROM citas WHERE Rol_usuario = '2'";
        $result = mysqli_query($this->connection, $query);
        while ($row=mysqli_fetch_assoc($result)) {
            $id = $row['Codigo_cita'];
            echo "<option value='$id'>$id</option>";
        }
    }

    public function ReagendarCita(){
        if (isset($_POST['submit'])){
            $clinic = $_POST['clinic'];
            $especial = $_POST['espec'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['tiempo'];
            $id = $_POST['id'];
            $query="UPDATE citas SET clinica_name = '$clinic', Especialidad = '$especial', Fecha_asignada = '$fecha', Hora_asignada = '$hora' WHERE Codigo_cita = '$id' and clinica_labor = '$clinic'";
            $query2 = "SELECT ID_medico FROM medicos WHERE Especialidad = '$especial' and '$fecha' between fecha_desde and fecha_hasta and '$hora' between hora_desde and hora_hasta";
            $query3 = "SELECT usuarios.Correo FROM usuarios inner join citas ON usuarios.Cedula = citas.Cedula_usuario WHERE citas.Codigo_cita = '$id'";
            $result = mysqli_query($this->connection, $query);
            $result2 = mysqli_query($this->connection, $query2);
            $result3 = mysqli_query($this->connection, $query3);
            $record = mysqli_fetch_array($result3);
            if ($result and $result2 and $record){
                $to = $record['Codigo_cita' == $id];
                $subject ="Cita medica";
                $message = "Se actualizo su cita";
                mail($to,$subject,$message);
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Cita actualizada, revise su correo';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'Datos del medico erroneo, intente nuevamente';
                echo '</div>';
            }
        }
    }

    public function CancelarCita(){
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $query = "SELECT usuarios.Correo FROM usuarios inner join citas ON usuarios.Cedula = citas.Cedula_usuario WHERE citas.Codigo_cita = '$id'";
            $result = mysqli_query($this->connection, $query);
            $record = mysqli_fetch_array($result);
            if ($record) {
                $query2 = "DELETE FROM citas WHERE Codigo_cita = '$id'";
                $result2 = mysqli_query($this->connection, $query2);
                $to = $record['Codigo_cita' == $id];
                $subject ="Cita medica";
                $message = "Se elimino su cita medica";
                mail($to,$subject,$message);
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Cita eliminada, revise su correo';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'Error';
                echo '</div>';
            }
        }
    }



    //Funciones de Medico
    public function CrearCitaMed(){
        if (isset($_POST['submit'])){
            $clinic = $_POST['clinic'];
            $especial = $_POST['espec'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['tiempo'];
            $cedula = $_POST['ced'];
            $query2 = "SELECT ID_medico FROM medicos WHERE Especialidad = '$especial' and '$fecha' between fecha_desde and fecha_hasta and '$hora' between hora_desde and hora_hasta and clinica_labor = '$clinic'";
            $query3 = "SELECT Hora_asignada, Fecha_asignada FROM citas WHERE current_date > '$fecha' and current_time > '$hora'";
            $query4 = "SELECT usuarios.Correo FROM usuarios inner join paciente ON usuarios.Cedula = paciente.Cedula WHERE usuarios.Cedula = '$cedula'";
            $result2 = mysqli_query($this->connection, $query2);
            $result3 = mysqli_query($this->connection, $query3);
            $result4 = mysqli_query($this->connection, $query4);
            $record = mysqli_fetch_array($result2);
            $record2 = mysqli_fetch_array($result4);
            if ($record and $result3 and $record2){
                $query = "INSERT INTO citas(clinica_name,especialidad, Fecha_asignada, Hora_asignada, Permisos, Rol_usuario, Cedula_usuario) VALUES ('$clinic','$especial', '$fecha', '$hora', 'admin', '3', '$cedula')";
                $result = mysqli_query($this->connection, $query);
                $to = $record2['Cedula' == $cedula];
                $subject ="Cita medica";
                $message = "Se creo su cita medica";
                mail($to,$subject,$message);
                echo '<div class="alert alert-primary" role="alert"> ';
                echo 'Cita creada, revise su correo';
                echo '</div>';
            }else {
                echo '<div class="alert alert-secondary" role="alert"> ';
                echo 'No existe el medico o cedula ingresada fue incorrecta';
                echo '</div>';
            }

        }
    }

    public function MostrarCitaMed(){
        $query = "SELECT * FROM citas WHERE Rol_usuario = '3'";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis citas fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5">';
            echo '<div class="pe-5">';
            echo '<img src="img/esterocopio.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            $nombre = $row['clinica_name'];
            echo "Nombre de la clinica: $nombre";
            echo "<br>";
            $cod = $row['Codigo_cita'];
            echo "Numero de cita: $cod";
            echo "<br>";
            $hora = $row['Hora_asignada'];
            echo "Hora de la cita: $hora";
            echo "<br>";
            $fecha = $row['Fecha_asignada'];
            echo "Fecha de la cita: $fecha";
            echo "<br>";
            $espec = $row['especialidad'];
            echo "Especialidad del doctor: $espec";
            echo "<br>";
            $fecha_c = $row['fecha_creacion'];
            echo "Cita creada: $fecha_c";
            echo "<br>";
            $cedula = $row['Cedula_usuario'];
            echo "Cedula de Paciente: $cedula";
            echo "<br>";
            echo "<br>";
            echo '</div>';
            echo '</div>';
        }
    }

    public function MostrarPaciente(){
        $query = "SELECT citas.Cedula_usuario, usuarios.Nombre, usuarios.Apellido, citas.Hora_asignada, citas.Fecha_asignada FROM paciente inner join usuarios ON paciente.Cedula = usuarios.Cedula
                                         inner join citas ON usuarios.Cedula = citas.Cedula_usuario";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis pacientes fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex pb-5 align-items-center">';
            echo '<div class="pe-5">';
            echo '<img src="iconos/boy.svg" alt="">';
            echo '</div>';
            echo '<div class="">';
            $nombre = $row['Nombre'];
            $Apellido = $row['Apellido'];
            echo "Paciente: $nombre $Apellido";
            echo "<br>";
            $cedula = $row['Cedula_usuario'];
            echo "Cedula: $nombre";
            echo "<br>";
            $hora = $row['Hora_asignada'];
            echo "Hora de la cita: $hora";
            echo "<br>";
            $fecha = $row['Fecha_asignada'];
            echo "Dia de la cita: $fecha";
            echo "<br>";
            echo "<br>";
            echo '</div>';
            echo '</div>';
        }
    }

    public function MostrarCodCitaMed(){
        $query = "SELECT Codigo_cita FROM citas WHERE Rol_usuario = '3'";
        $result = mysqli_query($this->connection, $query);
        while ($row=mysqli_fetch_assoc($result)) {
            $id = $row['Codigo_cita'];
            echo "<option value='$id'>$id</option>";
        }
    }



}