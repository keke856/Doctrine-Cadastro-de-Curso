<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;

require __DIR__."../../../vendor/autoload.php";

class CadastroCurso implements InterfaceCotroladorRequisicao{

private $entityManager;

   public function __construct()
   {
       $entityManagerCreator = new EntityManagerCreator();
       $this->entityManager = $entityManagerCreator->getEntityManager();
   }



    public function processarRequisicao():void
    {
        $titulo = "Cadastro de Curso";
        require __DIR__."/../../view/cadastro-curso.php";
    }


}



