<?php
    include_once('model/conn.php');
    class Item_DAO{

        private $item_id;
        private $item_name;
        private $item_desc;
        private $item_img;
        private $item_status;
        private $user_id;

        
        function __construct($data){
            $this->item_id = $data[0];
            $this->item_name = $data[1];
            $this->item_desc = $data[2];
            $this->item_img = $data[3];
            $this->item_status = $data[4];
            $this->user_id = $data[5];
        }

        public function register(){
            $conn = new Connection_db;
            $data = [$this->item_name, $this->item_desc, $this->item_img, $this->item_status, $this->user_id];
            return $conn->register_item($data);
        }

        public function edit(){
            $conn = new Connection_db;
            $data = [$this->item_id, $this->item_name, $this->item_desc, $this->item_img, $this->item_status];
            $conn->edit_item($data);
        }

        public function delete()
        {
            $conn = new Connection_db;
            $conn->delete_item($this->item_id);
        }


        function setItem_id($data){
            $this->item_id = $data;
        }
        function getItem_id(){
            return $this->item_id;
        }

        function setItem_name($data){
            $this->item_name = $data;
        }
        function getItem_name(){
            return $this->item_name;
        }

        function setItem_desc($data){
            $this->item_desc = $data;
        }
        function getItem_desc(){
            return $this->item_desc;
        }

        function setItem_img($data){
            $this->item_img = $data;
        }
        function getItem_img(){
            return $this->item_img;
        }

        function setItem_status($data){
            $this->item_status = $data;
        }
        function getItem_status(){
            return $this->item_status;
        }

        function setUser_id($data){
            $this->user_id = $data;
        }
        function getUser_id(){
            return $this->user_id;
        }
    }
?>