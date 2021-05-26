<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Controller\FlashMessage;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__."/../../vendor/autoload.php";

class RealizarLogin implements RequestHandlerInterface{

 use FlashMessage;   

private $entityManager;
private $repository;

    public function __construct()
    {
           $this->entityManager = (new EntityManagerCreator)->getEntityManager();
          $this->repository = $this->entityManager->getRepository(Usuario::class);        
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
       
        $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

        if(is_null($email) || $email ===false){
            $_SESSION['tipo'] = "danger";
            $_SESSION['mensagem'] = "Email Inválido";
            header("Location: /login");
            exit();
        }

        /**
         * @var Usuario usuario
         */
        $usuario = $this->repository->findOneBy(['email'=>$email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->message( "danger", "Senha ou email inválidos" );
            header("Location: /login");
          
          exit();
        }

        $_SESSION['logado'] = true;

      // header('Location: /listar-cursos');
       
     return (new Response(200,['Location'=>' /listar-cursos']));
  
  
    }
    
     




}