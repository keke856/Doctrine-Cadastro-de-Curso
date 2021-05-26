<?php
namespace Alura\Cursos\Controller;



use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\ControllerComHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require_once __DIR__."/../../vendor/autoload.php";


class Alterar extends ControllerComHtml implements RequestHandlerInterface{

    private $repository;

    public function __construct()
    {
      $entityManager = (new EntityManagerCreator())->getEntityManager();  
      $this->repository= $entityManager->getRepository(Curso::class);
    
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
         
     // $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
     $queryString = $request->getQueryParams();
     $id = $queryString['id'];

    if (is_null($id) || $id === false) {
        header('Location: /listar-cursos');
    }

   $cursos = $this->repository->find($id); 
   
// require em arquivos html
  $html = $this->renderizaHtml('/cadastro-curso.php',
   [
     'titulo'=>"Alteração de Cursos ".$cursos->getDescricao(),
     'cursos'=>$cursos
   ]);

  
       return (new Response(200,[],$html));
    }
       
    
  
    
}