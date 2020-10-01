<?php
	include('conn.php');
    if(isset($_GET['action']) && $_GET['action'] = 'login'){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$conn = new Connection_db();
		$conn->login($user, $pass);
	}

    if(isset($_GET['action']) && $_GET['action'] = 'edit'){
		session_start();
		$user=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$confirmpass=$_POST['confirmpass'];
		if($pass == $confirmpass){
			$conn = new Connection_db();
			$data = [$_SESSION['user_id'], $user, $email, $pass];
			$conn->edit_user($data);
		}

	}
	if(isset($_GET['action']) && $_GET['action'] = 'register'){
		$user=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$confirmpass=$_POST['confirmpass'];
		if($pass == $confirmpass){
			$conn = new Connection_db();
			$data = [$user, $email, $pass];
			$conn->register_user($data);
		}

	}
?>