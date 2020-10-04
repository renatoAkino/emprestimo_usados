<?php
    include_once('model/conn.php');

    
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
            $data = [$this->id_loan, $this->item_id, $this->user_id];
            return $conn->newLoan($data);
        }
        
        public function deleteloan()
        {
            $conn = new Connection_db;
            $conn -> deleteloan($this->id_loan);
        }

       
        function setItem_id($data){
            $this->item_id = $data;
        }
        function getItem_id(){
            return $this->item_id;
        }

        function setUser_id($data){
            $this->user_id = $data;
        }

        function getUser_id(){
            return $this->user_id;
        }

        function setId_loan($data){
            $this->id_loan = $data;
        }

        function getId_loan(){
            return $this->id_loan;
        }



       
     }

        

    
?>