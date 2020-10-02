<?php
    class Connection_db{
        public $db_user="root";
        public $db_pass="";
        public $db="trabalho_lp2";
        public $server="localhost";
        
        function __construct(){}
        
        

        function  login($name, $pass){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query="SELECT * FROM user WHERE user_name='".$name."' and user_pass= '".$pass."'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1){
                $data = mysqli_fetch_array($result);
                session_start();
                $_SESSION['user_id']=$data[0];
		        $_SESSION['user_name']=$data[1];
                $_SESSION['user_email']=$data[2];
                $_SESSION['user_pass']=$data[3];

                header('location:../index.php?page=home');
            }else{
                echo $query;
                header('location:../index.php?login=fail');
            }
        }

        function edit_user($data){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query = "UPDATE user SET user_name='".$data[1]."',user_email='".$data[2]."',user_pass='".$data[3]."' WHERE user_id = ".$data[0]."";
            $result = mysqli_query($conn, $query);
            $_SESSION['user_id']=$data[0];
            $_SESSION['user_name']=$data[1];
            $_SESSION['user_email']=$data[2];
            $_SESSION['user_pass']=$data[3];
            echo 'editou';
            //header('location: ../index.php?page=perfil');
        }

        function register_user($data){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query ="INSERT INTO user(user_name, user_email, user_pass) VALUES ( '".$data[0]."', '".$data[1]."', '".$data[2]."')";
            $result = mysqli_query($conn, $query);
            session_start();
            $_SESSION['user_name']=$data[0];
            $_SESSION['user_email']=$data[1];
            $_SESSION['user_pass']=$data[2];
            echo 'registrou';
            //header('location:../index.php?page=home');
        }
    }
?>