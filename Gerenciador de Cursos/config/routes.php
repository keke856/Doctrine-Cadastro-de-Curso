<?php

use Alura\Cursos\Controller\Formulario;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persiste;

return [
     '/listar-cursos' => ListarCursos::class,
     '/novo-curso' => Formulario::class,
     '/salvar-dados' => Persiste::class
 ];