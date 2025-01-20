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
    function opcion() {
        if(isset($_POST["nota"])) {
            mostrarCalificar();
        }else if(isset($_POST["exp"])) {
            require_once('expedientes.php');
        }
    }
    function calificar() {
        mostrarCalificar();
    }
    function calificador(){
        if(isset($_POST["calificar"])){
            $cont = 0;
            $contador = 0;
            $alumnoDni = $_POST["alumno"];
            while(isset($_POST["curso".$cont.""])){
                $curso = $_POST["curso".$cont.""];
                $modulo = $_POST["modulo".$cont.""];
                $asignatura = $_POST["asignatura".$cont.""];
                $nota = $_POST["notaNueva".$cont.""];
                if($nota <= 10 || $nota >= 0){
                    require_once('class.aluasig.php');
                    $aluasig = new aluasig();
                    if($aluasig->nuevaNota($alumnoDni, $curso, $modulo, $asignatura, $nota)){
                        $contador++;
                    }
                }
            }
            if($contador == $cont){
                echo "<script>alert('Calificaciones actualizadas correctamente.');</script>";
                mostrarCalificacionesAlumnos($alumnoDni);
            }
        }
    }
    if(isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('inicio.html');
    }
?>