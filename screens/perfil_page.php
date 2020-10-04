<?php
    include('tiles/navbar.php');
    
?>

<form action="model/user.php?action=edit" method='POST' class="col-6 mx-auto mt-4">
    <h3 class="text-center mb-4">Edite seu perfil</h3>
    <input class="form-control" type='text' name='name' value='<?php echo $_SESSION['user_name']?>'></br>
    <input class="form-control" type='text' name='email' value='<?php echo $_SESSION['user_email']?>'></br>
    <input class="form-control" type='password' name='pass' placeholder="senha"></br>
    <input class="form-control" type='password' name='confirmpass' placeholder="confirmar senha"></br>
    <input type="submit" class="btn btn-success" value="Enviar">
</form>