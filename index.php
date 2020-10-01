<html>
    <head>
        <title>Trabalho LP2</title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <body>
        <?php
            session_start();
            if(isset($_GET['logout']) && $_GET['logout']){
                session_destroy();
                header('location:index.php');
            }
            if(isset($_GET['login']) && $_GET['login'] == 'sucess'){
                echo '<a href="?logout=true">Sair</a>';
                include('screens/home_page.php');
            }else{
        ?>
        <form action='screens/login.php' method='POST'>
            <input type='text' name='user'></br>
            <input type='password' name='pass'></br>
            <input type='submit' name='submit' value="Entrar">
        </form>
        <?php
            }
            if(isset($_GET['login']) && $_GET['login'] == 'fail'){
                echo "Falha no login";
            }
        ?>
    </body>
</html>