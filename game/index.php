<?php
    require_once ("controller/Controller.php");

    $controller = new Controller();
    $controller->show();
    if(!isset($_GET['id'])) {
        $controller->viewall();
        //$controller->show();
    }
    else {
        $controller->view();
    }
    $controller->imp();
?>