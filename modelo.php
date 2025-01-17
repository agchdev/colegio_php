<?php 
    function mostrarCalificar() {
        require_once('class.alumno.php');
        $alumnos = new alumno();
        $alumnos = $alumnos->obtenerAlumnos();
        require_once('calificar.php');
    }
?>