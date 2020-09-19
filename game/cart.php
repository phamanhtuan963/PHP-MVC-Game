<?php
    include_once ("controller/Controller.php");
    session_start();
    $controller = new Controller();
    $controller ->invoke_cart();
    //$controller -> invoke_cart($template = 'view/order.php');
    //$controller->invoke();
?>