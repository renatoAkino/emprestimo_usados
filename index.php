<html lang="pt-br">
    <head>
        <title>Trabalho LP2</title>
    </head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <body>
        <div class="container">
        <?php
            
            session_start();
            if(isset($_GET['logout']) && $_GET['logout']){
                session_destroy();
                header('location:index.php');
            }
            if(isset($_SESSION['user_id'])){
                if(isset($_GET['page'])){
                    switch($_GET['page']){
                        case 'emprestimoReturn':
                        case 'emprestimoLoan':
                        case 'emprestimo':  $_SESSION['page'] = 'animation start-about'; 
                                            include('screens/emprestimo.php');break;

                        case 'home':    $_SESSION['page'] = 'animation start-home';
                                        include('screens/home_page.php');break;
                        case 'itens_register':
                        case 'itens_edit':
                        case 'itens':  $_SESSION['page'] = 'animation start-blog'; 
                                        include('screens/itens_page.php');break;

                        case 'perfil':  $_SESSION['page'] = 'animation start-portefolio'; 
                                        include('screens/perfil_page.php');break;
                        default: $_SESSION['page'] = 'animation start-home'; 
                    }
                }else{
                    $_SESSION['page'] = 'animation start-home';
                }
                      
            }else{
                
        ?>
        
        
            <form action='model/user.php?action=login' method='POST'>
                <input class="form-control" type='text' name='user'></br>
                <input class="form-control" type='password' name='pass'></br>
                <input class="form-control" type='submit' name='submit' value="Entrar">
            </form>
            <a href="screens/cadastro.php">Cadastrar-se</a>
            <?php
                }
                if(isset($_GET['login']) && $_GET['login'] == 'fail'){
                    echo "Falha no login";
                }
            ?>
        
        </div>
        
    </body>
</html>