<?php

 namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__."/../../vendor/autoload.php";
class Logout implements RequestHandlerInterface{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        unset($_SESSION['logado']);
      //  header("Location: /login");
      return (new Response(200,['Location'=>'/login']));
    }
    
   

}