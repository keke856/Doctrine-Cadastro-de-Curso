<?php

use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
require "../vendor/autoload.php";

$path = $_SERVER['PATH_INFO'];
$route = require_once __DIR__."/../config/routes.php";



if(!array_key_exists($path,$route)){
  echo "Erro 404";
}
  session_start();

  $verificar = stripos($path,'login');

if(!isset($_SESSION['logado']) && !$verificar){
   
  header("Location: /login");
  exit();

}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);

$request = $creator->fromGlobals();




  $classeControladora = $route[$path];
  /**
   * @var ContainerInterface $conteiner
   */
  $conteiner = require __DIR__."/../config/dependencie.php";
  $controlador =  $conteiner->get($classeControladora);
 $resposta = $controlador->handle($request);

 foreach ($resposta->getHeaders() as $name => $values) {
  foreach ($values as $value) {
      header(sprintf('%s: %s', $name, $value), false);
  }
}

echo $resposta->getBody();



?>




