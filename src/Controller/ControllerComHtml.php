<?php
 
 namespace Alura\Cursos\Controller;

 abstract class ControllerComHtml{

    public function renderizaHtml(string $caminhoTemplete,array $dados)
    {
        extract($dados);
        ob_start();     
        require_once __DIR__."/../../view/".$caminhoTemplete;
        $html= ob_get_clean();
        return $html;
    }




  }




?>