<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceCotroladorRequisicao;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TestePsr implements RequestHandlerInterface{

    public function handle(ServerRequestInterface $request): ResponseInterface
     {

            $html  ='teste';

            return new Response(200,[],$html);

    }


}