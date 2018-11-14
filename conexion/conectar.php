<?php

$bd = "saber2";
$host = "localhost";
$user = "root";
$pass = "NtSistema$";

$conexion = @mysql_connect($host,$user,$pass) or trigger_error(mysql_error(),E_USER_ERROR);

class conexion
{
    private $servidor;
    private $usuario;
    private $contraseña;
    private $basedatos;
    public  $conexion;
    public function __construct(){
        $this->servidor   = "localhost";
        $this->usuario	  = "root";
        $this->contraseña = "NtSistema$";
        $this->basedatos  = "saber2";
    }
    function conectar(){
        $this->conexion= new mysqli($this->servidor,$this->usuario,$this->contraseña,$this->basedatos);
    }
    function cerrar(){
        $this->conexion->close();
    }
}
?>