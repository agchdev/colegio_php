<?php

require_once('class.db.php');

class aluasig{
    private $conn;
    private $nota;
    private $idAlumno;
    private $idAsignatura;
    public function __construct(float $n=0.0, int $idal=0, int $idasi=0){
        $this->conn = new db();
        $this->nota = $n;
        $this->idAlumno = $idal;
        $this->idAsignatura = $idasi;
    }
    public function obtenerDatos($idAlumno){
        $asi = "";
        $mod = "";
        $cur = "";
        $nota = 0; // Variable local para manejar el valor de nota
        // Convertir $idAlumno a double
        $idAlumno = doubleval($idAlumno);
        $consulta = "SELECT nota, nombre, modulo, curso FROM alu_asig, asignaturas WHERE id_alum = $idAlumno AND id_asig = id";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->execute();
        $sentencia->bind_result($nota , $asi, $mod, $cur);
        
        $alumnoCalificaciones = array();
        while ($sentencia->fetch()) {
            if ($nota === null) { // Verificar si nota es null
                $nota = 2;
            }
            $alumnoCalificaciones[] = array(
                "nota" => $nota,
                "asignatura" => $asi,
                "modulo" => $mod,
                "curso" => $cur
            );
        }
        $sentencia->close(); // Cerrar la sentencia para liberar recursos
        return $alumnoCalificaciones;
    }
}

?>