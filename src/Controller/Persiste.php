<?php

namespace Alura\Cursos\Controller;

use  Alura\Cursos\Controller\FlashMessage;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

require_once __DIR__."/../../vendor/autoload.php";

class Persiste implements RequestHandlerInterface{

use FlashMessage;    
private $entityManager;
private $repository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $this->entityManager->getRepository(Curso::class);
        
    }
  
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
      
        //$descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);
       $queryString = $request->getParsedBody();
       $descricao = $queryString ['descricao'];
      
       $cursos = new Curso();
        $cursos->setDescricao($descricao);

         
       $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
      
        if(!is_null($id)&& $id!== false){

          // $curso = $this->repository->find(Curso::class,$id);
         //  $curso->setDescricao($descricao);
           $cursos->setId($id);
           $this->entityManager->merge($cursos); 
           $this->message( "success", "Curso Alterado com Sucesso" );

        }else{
            $this->entityManager->persist($cursos);
            $this->message( "success", "Curso Cadastrado com sucesso" );
          
        }

    
        $this->entityManager->flush();

     

      //  header('location:/listar-cursos',false,302);

        return (new Response(200,['Location'=>'/listar-cursos']));
    }
   
        
    
}