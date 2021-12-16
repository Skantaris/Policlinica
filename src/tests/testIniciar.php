<?php
namespace Policlinica\src\test\testIniciar;

use Policlinica\modelo\Modelo;

use \PHPUnit\Framework\TestCase;


//soy una basura en esto, ayuda Diosito -Tomy
class testIniciar extends TestCase{

    public function testListar(){
        $modelo = new Modelo();
        $this->assertNotEmpty($modelo->listar());
    } 

    public function testCedula(){
        $modelo = new Modelo();
        $this->modelo->Cedula = '1';
        //$this->modelo->Contrasena = '1';
        $this->assertSame($modelo->getCedula());
    }

}