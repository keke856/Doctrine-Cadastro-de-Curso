<?php

use Alura\Cursos\Controller\Alterar;
use Alura\Cursos\Controller\Formulario;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persiste;
use Alura\Cursos\Controller\Excluir;
use Alura\Cursos\Controller\Login;
use Alura\Cursos\Controller\RealizarLogin;
use Alura\Cursos\Controller\Logout;

return [
     '/listar-cursos' => ListarCursos::class,
     '/novo-curso' => Formulario::class,
     '/salvar-dados' => Persiste::class,
     '/excluir' => Excluir::class,
     '/alterar' => Alterar::class,
     '/login'=> Login::class,
     '/realizar-login'=>RealizarLogin::class,
     '/logout' => Logout::class,
    
 ];