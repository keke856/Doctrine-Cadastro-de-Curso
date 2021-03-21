<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

require_once __DIR__."/../../vendor/autoload.php";

class Persiste implements InterfaceCotroladorRequisicao{
private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    public function processarRequisicao(): void
    {
       $descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);

        $cursos = new Curso();
        $cursos->setDescricao($descricao);
        $this->entityManager->persist($cursos);
        $this->entityManager->flush();

        header('location:/public/listar-cursos',false,302);
        
    }
}