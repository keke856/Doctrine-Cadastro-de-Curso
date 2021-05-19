<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Infra\EntityManagerCreator;

require __DIR__."/../../vendor/autoload.php";

class RealizarLogin implements InterfaceCotroladorRequisicao{

private $entityManager;
private $repository;

    public function __construct()
    {
           $this->entityManager = (new EntityManagerCreator)->getEntityManager();
          $this->repository = $this->entityManager->getRepository(Usuario::class);        
    }

    public function processarRequisicao(): void
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
            $_SESSION['tipo'] = "danger";
            $_SESSION['mensagem'] = "Senha ou email inválidos";
            header("Location: /login");
          
          exit();
        }

        $_SESSION['logado'] = true;

       header('Location: /listar-cursos');
       
    }




}