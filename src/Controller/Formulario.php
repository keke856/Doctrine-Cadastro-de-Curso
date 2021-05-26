<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__."../../../vendor/autoload.php";

class Formulario extends ControllerComHtml implements RequestHandlerInterface{


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
          // $titulo = "Cadastro de Curso";
       // require __DIR__."/../../view/cadastro-curso.php";
       $html = $this->renderizaHtml("/cadastro-curso.php",[
        'titulo'=>"Cadastro de Curso",
    ]);
           return (new Response(200,[],$html));
    }
    
     


}



