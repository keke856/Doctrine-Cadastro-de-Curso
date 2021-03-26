<?php

require "../vendor/autoload.php";

$path = $_SERVER['PATH_INFO'];
$route = require_once __DIR__."/../config/routes.php";


if(!array_key_exists($path,$route)){
  echo "Erro 404";
}

 $classeControladora = $route[$path];
  $controlador = new $classeControladora();
  $controlador->processarRequisicao();


















 

/*
use Alura\Cursos\Controller\Formulario;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persiste;
use Alura\Cursos\Controller\Persistencia;

include_once __DIR__. "../../vendor/autoload.php";







 switch($_SERVER['PATH_INFO']){

     case "/listar-cursos":

    $listarCurso = new ListarCursos();
    $listarCurso->processarRequisicao();
  
       
     break;
     case "/novo-curso":
        
        $cadastroCurso = new Formulario();
         $cadastroCurso->processarRequisicao();

     break;
     case '/salvar-dados':
        $persiste = new Persiste();
        $persiste->processarRequisicao();
      break;
     
     
     
     default:
       echo "Erro 404";
     break;


   }


*/
?>