<?php
    include('model /conn.php');
    class Loan_DAO{
        
        private $id_loan ;
        private $item_id ;
        private $user_id ;

        function _construct($data){
            $this-> id_loan = $data[0];
            $this-> item_id = $data[1];
            $this-> user_id = $data[2];
        }

        public function newloan(){
            $conn = new Connection_db;
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query ="INSERT INTO user(user_name, user_email, user_pass) VALUES ( '".$id_loan."', '".$item_id."', '".$user_id."')";
            $result = $this -> execute_query ($query);
            return 'talvez tenha dado';
        }
        
        public function deleteloan($id_loan)
        {
            $conn = new Connection_db;
            $conn = new mysqli($this->server,$this->db_user,$this->db_pass,$this->db);
            $query = "DELETE FROM loan WHERE id_loan ". $id_loan;
            $this - > execute_query($query);
        }

    }
?>