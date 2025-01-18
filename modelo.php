<?php 
    function mostrarCalificar() {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        if(isset($_POST["alumno"])) {
            echo "<h2>" . $_POST["nomAlum"] . " - " . $_POST["dniAlum"] . "</h2>";
            mostrarCalificacionesAlumnos($_POST["alumno"], $_POST["nomAlum"], $_POST["dniAlum"]);
        }else{
            require_once('calificar.php');
        }
    }
    function mostrarCalificacionesAlumnos($idAlumno, $aluNom = "", $aluDni = "") {
        require_once('class.alumno.php');
        require_once('class.asignatura.php');
        $asignatura = new asignatura();
        $asignaturas = $asignatura->obtenerAsignaturas();
        $alumno = new alumno();
        $alumnos = $alumno->obtenerAlumnos();
        require_once('class.aluasig.php');
        $aluasig = new aluasig();
        $aluCalificaciones = $aluasig->obtenerDatos($idAlumno);
        require_once('calificar.php');
    }
?>