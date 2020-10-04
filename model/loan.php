<?php
 include('dao/Item_dao.php');
 include('dao/Loan_dao.php');

        
class Loan{
        function _construct(){}

        public function get_loan_itens(){
            $conn = new Connection_db ();
            $data_array = $conn->list_loan_itens($_SESSION['user_id']);
            $loan_list = array();
            foreach($data_array as $data){
                $loan = new Loan_DAO($data);
                array_push($loans_list,$loan);
            }
            return $this->cards_loan_list($loan_list);

        }

        
        public function get_unloan_itens($user_id){
            $conn = new Connection_db ();
            $data_array = $conn->list_unloan_itens($user_id);
            $itens_list = array();
            foreach($data_array as $data){
                $item = new Item_DAO($data);
                array_push($itens_list,$item);
            }
            return $this->cards_unloan_itens_list($itens_list);
        }


        public function cards_loan_itens($loan_list){
            
        
        }
        
        public function cards_unloan_itens_list($itens_list)     
        {
        
         foreach($itens_list as $item){

            echo "<option value=".$item->getItem_id().">".$item->getItem_name()."</option>";

        }

        
    }
}

    ?>