<?php

namespace Alura\Cursos\Controller;
use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;

require __DIR__."../../../vendor/autoload.php";

class Formulario implements InterfaceCotroladorRequisicao{


    public function processarRequisicao():void
    {
        $titulo = "Cadastro de Curso";
        require __DIR__."/../../view/cadastro-curso.php";
    }


}



