<?php

use Alura\Cursos\Controller\Alterar;
use Alura\Cursos\Controller\Formulario;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persiste;
use Alura\Cursos\Controller\Excluir;

return [
     '/listar-cursos' => ListarCursos::class,
     '/novo-curso' => Formulario::class,
     '/salvar-dados' => Persiste::class,
     '/excluir' => Excluir::class,
     '/alterar' => Alterar::class
 ];