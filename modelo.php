<?php 
    function mostrarCalificar() {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        mostrarCalificacionesAlumnos($alumnos);
        require_once('calificar.php');
    }
    function mostrarCalificacionesAlumnos($alumnos){
        require_once('class.aluasig.php');
        $aluasig = new aluasig();
        foreach ($alumnos as $alumno) {
            
        }
    }
?>