<?php
    class Connection_db{
        public $db_user="root";
        public $db_pass="";
        public $db="trabalho_lp2";
        public $server="localhost";
        
        function __construct()
        {
        }
        
        function connect(){
            
            return $conn;
        }

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

                header('location:../index.php?login=sucess');
            }else{
                header('location:../index.php?login=fail');
            }
        }
    }
?>