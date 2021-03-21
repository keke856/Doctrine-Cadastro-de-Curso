

  <?php include_once "fraguimento-front/inicio.php"?>

  <a href="/public/novo-curso" class="btn btn-primary mb-2">+ADD</a>  
   
        <ul class="list-group">
            <?php foreach ($cursos as $curso): ?>
                <li class="list-group-item">
                    <?= $curso->getDescricao(); ?>
                </li>
            <?php endforeach; ?>
        </ul>


<?php include_once "fraguimento-front/fim.php";
