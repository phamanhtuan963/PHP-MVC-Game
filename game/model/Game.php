<?php
    class Game{
        public $id;
        public $title;
        public $price;
        public $image;
        public $producer;

        public function __construct($id,$title, $price, $image, $producer){
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
            $this->image = $image;
            $this->producer = $producer;
        }
    }
?>