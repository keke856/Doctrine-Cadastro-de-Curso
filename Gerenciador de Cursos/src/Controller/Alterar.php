<?php
namespace Alura\Cursos\Controller;



use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

require_once __DIR__."/../../vendor/autoload.php";


class Alterar implements InterfaceCotroladorRequisicao{

    private $repository;

    public function __construct()
    {
      $entityManager = (new EntityManagerCreator())->getEntityManager();  
      $this->repository= $entityManager->getRepository(Curso::class);
    
    }

    public function processarRequisicao(): void
    {
       
       
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT);
    
        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
        }

       $cursos = $this->repository->find($id); 
        $titulo ="Alteração de Cursos ".$cursos->getDescricao();
        require_once __DIR__."/../../view/cadastro-curso.php";

  
    }
}