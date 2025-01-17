<?php 
    function mostrarCalificar() {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        if(isset($_POST["alumno"])) {
            mostrarCalificacionesAlumnos($_POST["alumno"], $_POST["nomAlum"], $_POST["dniAlum"]);
        }else{
            require_once('calificar.php');
        }
    }
    function mostrarCalificacionesAlumnos($alumno, $aluNom = "", $aluDni = "") {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        require_once('class.aluasig.php');
        $aluasig = new aluasig();
        $aluCalificaciones = $aluasig->obtenerDatos($alumno);
        require_once('calificar.php');
    }
?>