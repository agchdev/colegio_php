<?php
    function opcion() {
        require_once("modelo.php");
        if(isset($_POST["nota"])) {
            mostrarCalificar();
        }else if(isset($_POST["exp"])) {
            require_once('expedientes.php');
        }
    }
    function calificar() {
        require_once("modelo.php");
        mostrarCalificar();
    }
    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('inicio.html');
    }
?>