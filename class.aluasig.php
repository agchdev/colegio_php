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

    public function nuevaNota($alumnoDni, $curso, $modulo, $asignatura, $nota){
        $id_al = "";
        $id_as = "";
        $consultaIds = "SELECT id_alum, id_asig
                        FROM alumnos, asignaturas, alu_asig
                        WHERE id_alum = alumnos.id
                        AND id_asig = asignaturas.id
                        AND dni = ?
                        AND asignaturas.nombre = ?
                        AND modulo = ?
                        AND curso = ?;";
        $sentencia = $this->conn->getConn()->prepare($consultaIds);
        $sentencia->bind_param("sssi", $alumnoDni, $asignatura, $modulo, $curso);
        $sentencia->execute();
        $sentencia->bind_result($id_al, $id_as);
        $sentencia->close();

        $this->updatear($id_al, $id_as, $nota);
    }

    public function updatear($id_al, $id_as, $nota){
        $consulta = "UPDATE alu_asig SET nota = ? WHERE id_alum = ? AND id_asig = ?;";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->bind_param("iii", $nota, $id_al, $id_as);
        // Comprobar que el update se ha realizado correctamente
        if ($sentencia->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>