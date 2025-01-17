<?php
    function opcion() {
        if(isset($_POST["nota"])) {
            require_once('class.alumno.php');
            $alumnos = new alumno();
            $alumnos = $alumnos->obtenerAlumnos();
            require_once('calificar.php');
        }else if(isset($_POST["exp"])) {
            require_once('expedientes.php');
        }
    }

    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('inicio.html');
    }
?>