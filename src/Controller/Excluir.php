<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\FlashMessage;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require_once __DIR__."/../../vendor/autoload.php";

class Excluir implements RequestHandlerInterface{

use FlashMessage;
private $entityManager;

    public function __construct()
    {
       $this->entityManager= (new EntityManagerCreator())->getEntityManager();
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
       
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

       if(is_null($id) || $id === false){
           header('Location: /listar-cursos');
       }
 
    $curso = $this->entityManager->getReference(Curso::class,$id);
    $this->entityManager->remove($curso);
    $this->entityManager->flush();
   
    $this->message( "danger", "Curso Excluido com sucesso" );
       // header( 'Location: /listar-cursos');



       return (new Response(200,['Location'=>'/listar-cursos'])); 
    }
    
     

    




}