<?php

 namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;


require __DIR__."/../../vendor/autoload.php";
class Logout implements InterfaceCotroladorRequisicao{

    public function processarRequisicao(): void
    {
        unset($_SESSION['logado']);
        header("Location: /login");
    }

}