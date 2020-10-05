<?php
 include('dao/item_dao.php');
 include('dao/loan_dao.php');

        
class Loan{
        function __construct(){}

        public function get_loan_itens($user_id){
            $conn = new Connection_db ();            
            $data_array = $conn->list_loan_itens($user_id);
            $itens_list = array();
            foreach($data_array as $data){
                $loan = new Loan_DAO([$data[1], $data[2]]);
                $item_data = $conn->get_item($loan->getItem_id());
                $item = new Item_DAO($item_data);
                array_push($itens_list,$item);
            }
            var_dump($itens_list);
            return  $this->cards_unloan_itens_list($itens_list);;

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


        
        
        public function cards_unloan_itens_list($itens_list)     
        {
        
         foreach($itens_list as $item){

            echo "<option value=".$item->getItem_id().">".$item->getItem_name()."</option>";

        }

        

        
    }
}

    ?>