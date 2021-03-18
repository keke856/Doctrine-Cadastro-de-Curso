<?php

use Alura\Cursos\Controller\CadastroCurso;
use Alura\Cursos\Controller\ListarCursos;
include_once __DIR__. "../../vendor/autoload.php";

 switch($_SERVER['PATH_INFO']){

     case "/listar-cursos":

    $listarCurso = new ListarCursos();
    $listarCurso->processarRequisicao();
  
       
     break;
     case "/novo-curso":
        
        $cadastroCurso = new CadastroCurso();
         $cadastroCurso->processarRequisicao();

     break;
     default:
       echo "Erro 404";
     break;


   }



?>