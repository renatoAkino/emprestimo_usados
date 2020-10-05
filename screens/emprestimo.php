<?php
    include('tiles/navbar.php');
    include ('model/loan.php');
  
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'emprestimoLoan': 
                if(isset ($_POST ['item_id'])){
                $loan = new Loan_DAO([$_POST['item_id'], $_SESSION['user_id']]);
                echo $loan->newloan(); 
            
            }break;
            case 'emprestimoReturn':
                if(isset ($_POST ['loan_return'])){
                    $loan = new Loan_DAO([$_POST['loan_return'], $_SESSION['user_id']]);
                    echo $loan->deleteloan();   
                    echo 'Devolvido!  ';
                }break;
            default: echo 'default';
        }
    }
    
?>

<form action='index.php?page=emprestimoLoan' method='POST' enctype="multipart/form-data">
    <label>Escolha um item que deseja alugar</label>
    <select name="item_id">
    <?php
    $model = new loan();
    echo $model -> get_unloan_itens($_SESSION['user_id']);
    ?>
    </select>
     <input type="submit" value="Alugar">
    </form>



<form action='index.php?page=emprestimoReturn' method='POST' enctype="multipart/form-data">
    <label>Escolha um item que deseja devolver</label>
    <select name="loan_return">
    <?php
    $model = new loan();
    echo $model -> get_loan_itens($_SESSION['user_id']);
    ?>
    </select>
     <input type="submit" value="Devolver">
    </form>