<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

include_once __DIR__."../../../vendor/autoload.php";

class ListarCursos extends ControllerComHtml implements RequestHandlerInterface{

private $repositorioDeCursos;

   public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = $this->repositorioDeCursos->findAll();
        //$titulo = "Lista de Cursos";
        //include_once __DIR__."/../../view/list-cursos.php";

      $html = $this->renderizaHtml('list-cursos.php',[
        'titulo'=>"Lista de Cursos",
        'cursos'=>$cursos
        ]);

        return (new Response(200,[],$html));
    }

       
 


    




}


?>







