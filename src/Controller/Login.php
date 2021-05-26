<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\ControllerComHtml;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__."/../../vendor/autoload.php";

class Login extends ControllerComHtml implements RequestHandlerInterface{

  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    $html = $this->renderizaHtml('/login.php',[
      'titulo'=>"Login"
  ]);

   return (new Response(200,[],$html));
 
  }


}