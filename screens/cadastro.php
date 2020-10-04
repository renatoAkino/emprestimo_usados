<html>
    <head>
        <title>Cadastre-se</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="col-6 mx-auto my-4">
        <h2 class="text-center">Cadastre-se</h2>
            <form action="?submit=true" class="text-center" method='POST'>
                <input class="form-control" type='text' name='name' placeholder="Nome"></br>
                <input class="form-control" type='text' name='email' placeholder="e-mail"></br>
                <input class="form-control" type='password' name='pass' placeholder="Senha"></br>
                <input class="form-control" type='password' name='confirmpass' placeholder="Confirmar senha"></br>
                <input class="btn btn-success text-center" type="submit" value="Enviar">
            </form>
        </div>
    </div>
        
    </body>
</html>