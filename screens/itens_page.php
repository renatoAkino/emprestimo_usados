<?php
        include('tiles/navbar.php');
        include('model/item.php');
        if(isset($_POST['name'])){
            $item = new Item_DAO([ 0 , $_POST['name'], $_POST['desc'], $_POST['img'], 'Disponivel', $_SESSION['user_id']]);
            echo $item->register();
        }
        if($_GET['page'] == 'itens_register'){
    ?>
    <h3 class="text-center mt-4">Cadastre um novo item</h3>
    <form action='index.php?page=itens' method='POST' enctype="multipart/form-data" class="mt-4 mx-auto col-4">
        <input class="form-control" type="text" name="name" placeholder="Nome"></br>
        <input class="form-control" type="text" name="desc" Placeholder="Descrição"></br>
        <input class="form-control" type="text" name="img" placeholder="Caminho da imagem"/></br>
        <input class="btn btn-success" type="submit" value="Enviar">
    </form>
    
        <?php
            }else{
                echo "<a class='d-block mx-auto my-4' href='index.php?page=itens_register'>Cadastrar um novo</a>";
                $model = new Item();
                echo $model->get_user_itens();
                
        ?>
        
        
    
    <?php
        }
    ?>

