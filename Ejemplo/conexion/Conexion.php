<?php

/*
* Creado por Alejandro Isla - Willywes 2017
* @willywes_
* http://www.alejandroisla.tk
* http://www.tucreativa.cl
* https://github.com/Willywes
*/

class Conexion {

    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "1234";
    private $basedatos = "simplecrud";
    private $conexion = ""; // no definir

    public function __construct() {
        
    }

    public function abrirConexion() {
        $this->conexion = mysql_connect($this->servidor, $this->usuario, $this->clave) or die('Error de Conexión con MYSQL: ' . mysql_error());
        mysql_select_db($this->basedatos, $this->conexion);
        return $this->conexion;
    }

    public function cerrarConexion() {
        mysql_close($this->conexion);
    }

    public function generarTransaccion($sql) {
        $this->abrirConexion();
        $resultado = mysql_query($sql, $this->conexion) or die('Error de sentencia SQL: ' . mysql_error());
        $this->cerrarConexion();
        return $resultado;
    }

}

?>