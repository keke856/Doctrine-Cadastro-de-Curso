<?php
namespace Alura\Cursos\Controller;
use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;

require_once "../../vendor/autoload.php";

class Alterar implements InterfaceCotroladorRequisicao{

    public function processarRequisicao(): void
    {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        echo $id;
    }
}