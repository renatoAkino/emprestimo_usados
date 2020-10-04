<?php
    include('tiles/navbar.php');
    include ('model/loan.php');
  
    
    if(isset ($_POST ['item_id'])){
        $loan = new Loan_DAO([$_POST['item_id'], $_SESSION['user_id']]);
        echo $loan->newloan();
    
    
    }
    
    echo 'emprestimo';
?>

<form action='index.php?page=emprestimo' method='POST' enctype="multipart/form-data">
    <label>Escolha um item que deseja</label>
    <select name="item_id">
    <?php
    $model = new loan();
    echo $model -> get_unloan_itens();
    ?>
    </select>
     <input type="submit" value="Enviar">
    </form>

