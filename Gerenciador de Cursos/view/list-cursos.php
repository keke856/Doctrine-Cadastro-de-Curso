

  <?php include_once "fraguimento-front/inicio.php"?>

  <a href="/public/novo-curso" class="btn btn-primary mb-2">+ADD</a>  
   
        <ul class="list-group">
            <?php foreach ($cursos as $curso): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <?= $curso->getDescricao(); ?>
                <span>
                    <a href="/excluir?id=<?php echo $curso->getId() ?>" class="btn btn-danger btn-sm ">Excluir</a>
                    <a href="/alterar?id=<?php echo $curso->getId() ?>" class="btn btn-primary btn-sm ">Alterar</a>
                </span>
                </li>
            <?php endforeach; ?>
        </ul>


<?php include_once "fraguimento-front/fim.php";
