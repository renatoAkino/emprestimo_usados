<?php
    include('conn.php');
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	$conn = new Connection_db();
	$conn->login($user, $pass);

    
?>