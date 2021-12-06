<?php
namespace Policlinica\router;

use Policlinica\modelo\Modelo;
use Policlinica\App;
class Router{
    //Funcion para agregar ruta disponible para el usuario
    public array $routs = [];
    public function addRouts(string $rout, string $view){
        $this->routs[$rout] = $view;
    }

    public function result(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position){
            $path= substr($path, 0, $position);
        }

        if (isset($this->routs[$path])){  //Si el path existe correr esto
            $pagina=$this->routs[$path];
            $test=['modelo'=>new Modelo()];
            if ($this->routs[$path] === 'registrar'){       //Si el path es igual a === se agrega la funcion
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->insertardatos();
                }
               /* if (strtolower($_SERVER['REQUEST_METHOD']) === 'get'){
                    echo "no";
                }*/
            }
            if ($this->routs[$path] === 'nuevo-medico'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->AgregarMedico();
                }
            }

            if ($this->routs[$path] === 'nuevo-especialidades'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->AgregarEspecialidades();
                }
            }

            if ($this->routs[$path] === 'mis-clinicas'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->AgregarClinica();
                }
            }

            if ($this->routs[$path] === 'agendar_cita'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->CrearCitaPaciente();
                }
            }

           if ($this->routs[$path] === 'inicio'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    error_reporting(0);
                    $modelo = new Modelo();
                    echo $modelo->IniciarSesion();

                }
            }

            if ($this->routs[$path] === 'reagendar_cita'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->ReagendarCita();
                }
            }

            if ($this->routs[$path] === 'mis_citas'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->CancelarCita();
                }
            }

            if ($this->routs[$path] === 'agendar_cita_med'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->CrearCitaMed();
                }
            }

            if ($this->routs[$path] === 'mis_citas_med'){
                if (strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
                    $modelo = new Modelo();
                    echo $modelo->CancelarCita();
                }
            }


            $this->imprimir($pagina, $test);
        } else {
            echo "Pagina no encontrada";
        }
    }

    public function imprimir($pagina, array $variable = []){
        foreach ($variable as $key => $value)
        {
            $$key = $value;
        }

        ob_start();
        include_once App::$DIR."/views/$pagina.php";
        echo ob_get_clean();
    }
}

