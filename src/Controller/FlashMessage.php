<?php

 namespace  Alura\Cursos\Controller;

 require __DIR__."/../../vendor/autoload.php";

  trait FlashMessage{

    public function message( string $classe , string $message)
    {
          $_SESSION['mensagem'] = $message;
          $_SESSION['tipo'] = $classe;
    }

  }











?>