<?php

require_once('class.db.php');
class alumno {
    public $conn;
    private $id;
    private $dni;
    private $nombre;

    public function __construct(int $id=0, String $dni="", String $nombre="") {
        $this->conn = new db();
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
    }

    public function obtenerAlumnos() {
        $consulta = "SELECT * FROM alumnos";
        $sentencia = $this->conn->getConn()->prepare($consulta);
        $sentencia->execute();
        $sentencia->bind_result($this->id, $this->dni, $this->nombre);
        
        $alumnos = array();
        while ($sentencia->fetch()) {
            $alumnos[] = array(
                "id" => $this->id,
                "dni" => $this->dni,
                "nombre" => $this->nombre
            );
        }
        return $alumnos;
    }

}
