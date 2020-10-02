<?php
include('dao/item_dao.php');
class Item{
    function __construct(){}

    public function get_user_itens(){
        $conn = new Connection_db();
        $data_array = $conn->list_user_itens($_SESSION['user_id']);
        $itens_list = array();
        foreach($data_array as $data){
            $item = new Item_DAO($data);
            array_push($itens_list,$item);
        }
        return $this->cards_list($itens_list);
    }


    public function cards_list($itens_list)     
    {
        
        foreach($itens_list as $item){
            echo "<div class='container'>
                <div class='image'><img src='".$item->getItem_img()."' /></div>
                <div class='title'>".$item->getItem_name()."</div>
                <div class='description'>".$item->getItem_desc()."</div>
                <div class='status'>".$item->getItem_status()."</div>
                <a href='?page=itens_edit&id=".$item->getItem_id()."'>Editar</a>
            </div>";
        }
        
    }
}



?>