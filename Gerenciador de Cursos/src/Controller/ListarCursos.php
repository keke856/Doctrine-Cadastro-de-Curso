<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;

include_once __DIR__."../../../vendor/autoload.php";

class ListarCursos extends ControllerComHtml implements InterfaceCotroladorRequisicao{

private $repositorioDeCursos;

   public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processarRequisicao():void
    {
        $cursos = $this->repositorioDeCursos->findAll();
        //$titulo = "Lista de Cursos";
        //include_once __DIR__."/../../view/list-cursos.php";

      echo $this->renderizaHtml('list-cursos.php',[
        'titulo'=>"Lista de Cursos",
        'cursos'=>$cursos
        ]);
 


    }




}


?>







