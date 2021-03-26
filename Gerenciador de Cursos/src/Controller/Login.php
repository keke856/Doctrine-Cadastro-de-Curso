<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\ControllerComHtml;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
require __DIR__."/../../vendor/autoload.php";

class Login extends ControllerComHtml implements InterfaceCotroladorRequisicao{

  public function processarRequisicao(): void
  {
     echo $this->renderizaHtml('/login.php',[
          'titulo'=>"Login"
      ]);
     
  }


}