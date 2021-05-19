<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

require_once __DIR__."/../../vendor/autoload.php";

class Persiste implements InterfaceCotroladorRequisicao{
private $entityManager;
private $repository;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $this->entityManager->getRepository(Curso::class);
        
    }
    public function processarRequisicao(): void
    {
       $descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);
      
      

        $cursos = new Curso();
        $cursos->setDescricao($descricao);

         
       $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
      
        if(!is_null($id)&& $id!== false){

          // $curso = $this->repository->find(Curso::class,$id);
         //  $curso->setDescricao($descricao);
           $cursos->setId($id);
           $this->entityManager->merge($cursos);
           $_SESSION['tipo'] = "success";
           $_SESSION['mensagem'] = "Curso Alterado com Sucesso";

        }else{
            $this->entityManager->persist($cursos);
            $_SESSION['tipo'] = "success";
            $_SESSION['mensagem'] = "Curso Cadastrado com sucesso";
        }

    
        $this->entityManager->flush();

     

        header('location:/listar-cursos',false,302);
        
    }
}