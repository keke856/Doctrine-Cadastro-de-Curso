

<?php include_once "fraguimento-front/inicio.php"?>
            
            <form action="/salvar-dados?<?= isset($cursos)?'id='.$cursos->getId():'' ?>" method='post'>
                <div class="form-grup">
                    <input class="form-control w-25" type="text" name="descricao" placeholder="curso..." value="<?= isset($cursos)?$cursos->getDescricao():''; ?>">
                </div>
                <button class="btn btn-primary mt-2">Salvar</button>
            </form>
          
         
<?php include_once "fraguimento-front/fim.php";       