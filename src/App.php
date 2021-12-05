<?php
    namespace Policlinica;

    use Policlinica\router\Router;
    class App{
        public static string $DIR;
        public Router $router;
        public function __construct(string $dir){
            self::$DIR = $dir;
            $this->router = new Router();
        }

        public function inicio(){
            $this->router->result();
        }




        
    }