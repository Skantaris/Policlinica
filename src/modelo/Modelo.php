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
            $dia = $_POST ['dia'];
            $mes = $_POST ['mes'];
            $anio = $_POST ['anio'];
            $query="INSERT INTO usuarios(Cedula, Correo, Nombre, Apellido, Contrasena, Dia, Mes, Anio, Rol, Permisos) VALUES ('$cedula', '$correo', '$nombre', '$apellido', '$contrasena', '$dia', '$mes', '$anio', '2', 'admin')";
            $query2 = "INSERT INTO paciente (Cedula) VALUES ('$cedula')";
            $result = mysqli_query($this->connection,$query);
            $result2 = mysqli_query ($this->connection, $query2);
            if ($result and $result2) {
                echo "Registro realizado con éxito";
            }
            else
            {
                die('La inserción de los datos ha fallado '. mysqli_error());
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
        echo "Error, No ha creado una cuenta.";

    }
    mysqli_free_result($result);

    }

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
            $time = $_POST ['tiempo'];
            $query = "UPDATE usuarios set Rol = '3' where Cedula = '$cedula'";
            $query2 = "INSERT INTO medicos(Cedula_medico, Especialidad, fecha_disponible, hora_disponible) VALUES ('$cedula', '$especialidad', '$fecha_d', '$time')";
            $query3 = "DELETE FROM paciente WHERE Cedula = '$cedula'";
            $result = mysqli_query($this->connection, $query);
            $result2 = mysqli_query ($this->connection, $query2);
            $result3 = mysqli_query ($this->connection, $query3);
            if ($result and $result2 and $result3){
                echo "Se agrego un nuevo medico";
                header("Location: addMedico");
            } else {
                die ("El medico no se agrego". mysqli_error());
            }
            mysqli_close($this->connection);
        }
    }

    public function MostrarMedicos(){
        $query="SELECT usuarios.Nombre,medicos.Especialidad, medicos.ID_medico, medicos.fecha_creacion, medicos.fecha_disponible, medicos.hora_disponible FROM medicos inner join usuarios ON usuarios.Cedula = medicos.Cedula_medico";
        //$query2 = "SELECT medicos.Especialidad, medicos.Cedula_medico FROM medicos inner join especialidades ON medicos.Especialidad = especialidades.Nombre_Especialidades";
        $result = mysqli_query($this->connection, $query);
        //$result2 = mysqli_query ($connection, $query2);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            $nombre = $row['Nombre'];
            echo "Nombre del medico: $nombre";
            echo "<br>";
            $especialidad = $row['Especialidad'];
            echo "Especialidad del medico: $especialidad";
            echo "<br>";
            $ID = $row['ID_medico'];
            echo "ID del medico:$ID";
            echo "<br>";
            $fecha = $row ['fecha_creacion'];
            echo "Fecha creada: $fecha";
            echo "<br>";
            $fecha_d = $row ['fecha_disponible'];
            echo "Fecha disponible: $fecha_d";
            echo "<br>";
            $tiempo = $row ['hora_disponible'];
            echo "Hora Disponible: $tiempo";
            echo "<br>";
            echo "<br>";
            }
        mysqli_close($this->connection);
    }

    public function AgregarEspecialidades(){
        if (isset($_POST['submit'])){
            $nombre = $_POST ['name'];
            $query = "INSERT INTO especialidades(Nombre_Especialidades, Permisos) VALUES ('$nombre', 'admin')";
            $result = mysqli_query($this->connection, $query);
            if ($result){
                header ("Location: addEspec");
            } else {
                die ('La insercion a fallado' . mysqli_error());
            }
        }
    }

    public function MostrarEspecialidad(){
        $query="SELECT * FROM especialidades";
        $result = mysqli_query($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            $nombre = $row['Nombre_Especialidades'];
            echo "<option value='$nombre'>$nombre</option>";
            echo "<br>";
            }
    }

    public function AgregarClinica (){
        if(isset($_POST['submit'])){
            $nombre = $_POST['name'];
            $direccion = $_POST ['dir'];
            $query = "INSERT INTO clinicas(Nombre_clinica, Direccion_clinica, Permisos) VALUES ('$nombre', '$direccion', 'admin')";
            $result = mysqli_query ($this->connection, $query);
            if ($result){
                header ('Location: misClinicas');
            } else {
                die ('Fallo de ingresar la clinica' . mysqli_error());
            }
        }
    }

    public function MostrarClinicas(){
        $query = "SELECT * FROM clinicas";
        $result = mysqli_query ($this->connection, $query);
        if (!$result)
        die('La consulta a la tabla medicos ha fallado '. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
            echo "Nombre:";
            $nombre = $row['Nombre_clinica'];
            echo "<span>$nombre</span>";
            echo "Direccion:";
            $direccion = $row['Direccion_clinica'];
            echo "<span>$direccion</span>";
            echo "Fecha creada";
            $fecha = $row ['fecha_creacion'];
            echo "<span>$fecha</span>"; 
            echo "<br>";
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
            $query2 = "SELECT ID_medico FROM medicos WHERE Especialidad = '$especial' and hora_disponible = '$hora' and fecha_disponible = '$fecha'";
            $result2 = mysqli_query($this->connection, $query2);
            $record = mysqli_fetch_array($result2);
           if ($record){
               $query = "INSERT INTO citas(clinica_name,especialidad, Fecha_asignada, Hora_asignada, Permisos, Rol_usuario,Cedula_usuario) VALUES ('$clinic','$especial', '$fecha', '$hora', 'admin', '2', '$cedula')";
               $result = mysqli_query($this->connection, $query);
               echo "Cita Creada";
           }else {
               echo "No existe el medico";
           }

            }
    }


    public function MostrarCita(){
        $query = "SELECT * FROM citas WHERE Rol_usuario = '2'";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis citas fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
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
            $query="UPDATE citas SET clinica_name = '$clinic', Especialidad = '$especial', Fecha_asignada = '$fecha', Hora_asignada = '$hora' WHERE Codigo_cita = '$id'";
            $result = mysqli_query($this->connection, $query);
            if ($result){
                echo "cita actualizada";
            } else {
                die('Error en la actualizacion' . mysqli_error());
            }
        }
    }

    public function CancelarCita()
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM citas WHERE Codigo_cita = '$id'";
            $result = mysqli_query($this->connection, $query);
            if ($result) {
                echo "cita elminada";
            } else {
                die('Fallo al eliminar cita' . mysqli_error());
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
            $query2 = "SELECT ID_medico FROM medicos WHERE Especialidad = '$especial' and hora_disponible = '$hora' and fecha_disponible = '$fecha'";
            $result2 = mysqli_query($this->connection, $query2);
            $record = mysqli_fetch_array($result2);
            if ($record){
                $query = "INSERT INTO citas(clinica_name,especialidad, Fecha_asignada, Hora_asignada, Permisos, Rol_usuario, Cedula_usuario) VALUES ('$clinic','$especial', '$fecha', '$hora', 'admin', '3', '$cedula')";
                $result = mysqli_query($this->connection, $query);
                echo "Cita Creada";
            }else {
                echo "No existe el medico";
            }

        }
    }

    public function MostrarCitaMed(){
        $query = "SELECT * FROM citas WHERE Rol_usuario = '3'";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis citas fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
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
        }
    }

    public function MostrarPaciente(){
        $query = "SELECT citas.Cedula_usuario, usuarios.Nombre, usuarios.Apellido, citas.Hora_asignada, citas.Fecha_asignada FROM paciente inner join usuarios ON paciente.Cedula = usuarios.Cedula
                                         inner join citas ON usuarios.Cedula = citas.Cedula_usuario";
        $result = mysqli_query($this->connection,$query);
        if (!$result)
            die('la muestra de mis pacientes fallo'. mysqli_error());
        while ($row=mysqli_fetch_assoc($result)) {
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
        }
    }




}