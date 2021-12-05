<?php

use Policlinica\App;


require_once __DIR__ . "/../../vendor/autoload.php";

$app = new App(dirname(__DIR__));
$app->router->addRouts("/","inicio");
$app->router->addRouts("/registrarse","registrar");

$app->router->addRouts("/admin", "login_admin"); //Funciones de Admin
$app->router->addRouts("/addMedico", "nuevo-medico");
$app->router->addRouts("/addEspec", "nuevo-especialidades");
$app->router->addRouts("/misClinicas", "mis-clinicas");


$app->router->addRouts("/paciente", "login_paciente"); //Funciones de Paciente
$app->router->addRouts("/crear_cita", "agendar_cita");
$app->router->addRouts("/citas", "mis_citas");
$app->router->addRouts("/reagendar", "reagendar_cita");


$app->router->addRouts("/medico", "login_medico"); //Funciones de medico
$app->router->addRouts("/mis-pacientes", "mis_pacientes");
$app->router->addRouts("/crear_cita_med", "agendar_cita_med");
$app->router->addRouts("/mis-citas_med", "mis_citas_med");


$app->inicio();

