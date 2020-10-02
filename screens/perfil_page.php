<?php
    include('tiles/navbar.php');
    
?>

<form action="model/user.php?action=edit" method='POST'>
    <input type='text' name='name' value='<?php echo $_SESSION['user_name']?>'></br>
    <input type='text' name='email' value='<?php echo $_SESSION['user_email']?>'></br>
    <input type='password' name='pass'></br>
    <input type='password' name='confirmpass'></br>
    <input type="submit" value="Enviar">
</form>