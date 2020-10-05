<?php
    class Connection_db{
        public $db_user="root";
        public $db_pass="";
        public $db="trabalho_lp2";
        public $server="localhost";
        
        function __construct(){}
        
        

        function  login($name, $pass){
            $query="SELECT * FROM user WHERE user_name='".$name."' and user_pass= '".$pass."'";
            $result = $this->execute_query($query);
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
            $query = "UPDATE user SET user_name='".$data[1]."',user_email='".$data[2]."',user_pass='".$data[3]."' WHERE user_id = ".$data[0]."";
            $result = $this->execute_query($query);
            $_SESSION['user_id']=$data[0];
            $_SESSION['user_name']=$data[1];
            $_SESSION['user_email']=$data[2];
            $_SESSION['user_pass']=$data[3];
            header('location: ../index.php?page=perfil');
        }

        function register_user($data){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query ="INSERT INTO user(user_name, user_email, user_pass) VALUES ( '".$data[0]."', '".$data[1]."', '".$data[2]."')";
            $result = $this->execute_query($query);
            session_start();
            $_SESSION['user_name']=$data[0];
            $_SESSION['user_email']=$data[1];
            $_SESSION['user_pass']=$data[2];
            echo 'registrou';
            header('location:../index.php?page=home');
        }

        function register_item($data){
            
            $query ="INSERT INTO item(item_name, item_desc, item_img, item_status, user_id) VALUES ( '".$data[0]."', '".$data[1]."', '".$data[2]."' , '".$data[3]."' ,'".$data[4]."' )";
            $result = $this->execute_query($query);
            return 'talvez tenha dado';
            //header('location:index.php?page=itens');
        }

        function edit_item($data){
            $query = "UPDATE item SET item_name='".$data[1]."',item_desc ='".$data[2]."',item_img='".$data[3]."',item_status='".$data[4]."' WHERE user_id = ".$data[0]."";
            $result = $this->execute_query($query);
            header('location: ../index.php?page=itens');
        }

        function get_item($item_id){
            $query = "SELECT * FROM item WHERE item_id = ". $item_id;
            $result =  $this->execute_query($query);
            return mysqli_fetch_array($result);
        }
        function delete_item($item_id)
        {
            $query = "DELETE FROM item WHERE item_id = ". $item_id;
            $this->execute_query($query);
        }

        function list_user_itens($user_id){
            $query = 'SELECT * FROM item WHERE user_id = '.$user_id;
            $result = $this->execute_query($query);
            if(mysqli_num_rows($result) >= 1){
                $data = mysqli_fetch_all($result);
                return $data;
            }else{
                echo $query;
            } 
        }

        function execute_query($query){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $result = mysqli_query($conn, $query);
            return $result;
        }

        public function newloan($data){
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query ="INSERT INTO loan(item_id, user_id) VALUES (  $data[0], $data[1])";
            $result = $this -> execute_query ($query);
            $query = "UPDATE item SET item_status = 'EMPRESTADO' WHERE item_id = $data[0]";
            $   $result = $this -> execute_query ($query);
            return 'Sucesso! ';
        }
        
        public function deleteloan($item_id, $user_id){
            $query = "DELETE FROM loan WHERE item_id =". $item_id . " AND user_id  = ".$user_id ;
            $this -> execute_query($query);
            $query = "UPDATE item SET item_status = 'Disponivel' WHERE item_id = ".$item_id;
            $this -> execute_query($query);
    
        }

        function list_loan_itens($user_id){

            $query = "SELECT * FROM loan WHERE user_id = ".$user_id;
            $result = $this ->execute_query($query);
            if(mysqli_num_rows($result) >= 1){
                $data = mysqli_fetch_all($result);
                return $data;
            }else{
                echo $query;
            } 
        }

       function list_unloan_itens($user_id){
           $query = "SELECT * FROM item WHERE item_status = 'Disponivel' AND user_id != ". $user_id;
           $result = $this->execute_query($query);
           if(mysqli_num_rows($result) > 0){
               $data  = mysqli_fetch_all($result);
               return $data;
           }else{
               echo $query;
           } 
           }

    }
?>