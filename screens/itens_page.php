<?php
    include('tiles/navbar.php');
    include('model/item.php');
    if(isset($_POST['name'])){
        $item = new Item_DAO([ 0 , $_POST['name'], $_POST['desc'], $_POST['img'], 'Disponivel', $_SESSION['user_id']]);
        echo $item->register();
    }
    if($_GET['page'] == 'itens_register'){
?>
<form action='index.php?page=itens' method='POST' enctype="multipart/form-data">
    <input type="text" name="name"></br>
    <input type="text" name="desc"></br>
    <input type="text" name="img"/></br>
    <input type="submit" value="Enviar">
</form>
<?php
    }else{
        $model = new Item();
        echo $model->get_user_itens();
        
?>
    
    <a href="index.php?page=itens_register">Cadastrar um novo</a>
<?php
    }
?>