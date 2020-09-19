<?php
    require_once ("model/Database.php");
    class Controller{
        public $db;
        public function __construct()
        {
            $this->db = new Database();
        }
        public function  viewall()
        {
            $result = $this->db->getGameList();
            include 'view/gamelist.php';
        }
        public function view()
        {
            $game = $this->db->getGame($_GET['id']);
            include 'view/viewgame.php';
        }

        public function invoke()
        {
            $result = $this->db->getlogin();
            if($result == 'login')
            {
                include 'view/afterlogin.php';
            }
            else
            {
                include 'view/login.php';
            }

        }

        public function show()
        {
            $result = $this->db->insert_data();
            //include 'view/afterlogin.php';
        }

        public function imp()
        {
            $result = $this->db->import();
            //include 'view/afterlogin.php';
        }

        //protected $cart_contents = array();
        public function invoke_cart()
        {
            if(isset($_GET['action'])=='cart')
            {
                include 'view/order.php';
            }
            else{
                include 'view/order.php';
                $checkcart = 1;
                if(isset($_SESSION['cart']))
                {
                    foreach ($_SESSION['cart'] as $key => $value)
                    {
                        if(isset($value))
                        {
                            $checkcart =2;
                        }
                    }
                }
                if($checkcart != 2)
                {
                    echo "Your cart: <strong> 0 game</strong>";
                }
                else{
                    echo "Your cart: <strong>".count($_SESSION['cart'])." Sản Phẩm</strong><a href='".$_SERVER['PHP_SELF']."?action=cart'>Giỏ Hàng</a>";
                }
            }

            //include 'view/order.php';

            if(isset($_GET['addcart']))
            {
                $cart = $cart_sp->addCart($_GET['addcart']);

                echo "<script>window.history.back();</script>";
            }

            if(isset($_GET['delete']))
            {
                $cart = $cart_sp->delete($_GET['delete']);

                echo "<script>window.history.back();</script>";
            }

            if(isset($_GET['deleteAll']))
            {
                unset($_SESSION['cart']);
                echo "<script>window.history.back();</script>";
            }

            if(isset($_POST['update']))
            {
                $cart = $cart_sp->updatecart();
            }
        }



    }
?>