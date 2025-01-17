<?php

require_once('class.db.php');

class aluasig{
    private $conn;
    private $nota;
    private $idAlumno;
    private $idAsignatura;
    public function __construct(int $nota=0, int $idAlumno=0, int $idAsignatura=0){
        $this->conn = new db();
        $this->nota = $nota;
        $this->idAlumno = $idAlumno;
        $this->idAsignatura = $idAsignatura;
    }
    public function obtenerDatos($idAlumno, $idAsignatura){
        $consulta = "SELECT nota FROM aluasig WHERE ? = ? AND ? = ?";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->bind_param('iiii', $idAlumno, $idAlumno, $idAsignatura, $idAsignatura);
        $sentencia->execute();
        $sentencia->bind_result($this->nota);
        $sentencia->fetch();
        return $this->nota;
    }
}

?>