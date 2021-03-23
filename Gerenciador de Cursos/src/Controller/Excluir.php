<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

require_once __DIR__."/../../vendor/autoload.php";

class Excluir implements InterfaceCotroladorRequisicao{

private $entityManager;

    public function __construct()
    {
       $this->entityManager = (new EntityManagerCreator)->getEntityManager();
    }


    public function processarRequisicao(): void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
 
       if(is_null($id) || $id === false)
       {
           header( 'Location: /listar-cursos');
           return;
       }


        $curso = $this->entityManager->getReference(Curso::class,$id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header( 'Location: /listar-cursos');





    }




}