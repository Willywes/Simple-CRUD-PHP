<?php

/*
* Creado por Alejandro Isla - Willywes 2017
* @willywes_
* http://www.alejandroisla.tk
* http://www.tucreativa.cl
* https://github.com/Willywes
*/

// Clase 

require_once '../conexion/Crud.php';

class Usuario extends Crud { // heredamos de Crud 

    private $id;
    private $nombre;
    private $contrasena;
    private $tipo;

    public function __construct() {
        
    }

    public function Usuario($id, $nombre, $contrasena, $tipo) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->tipo = $tipo;
    }

    // getters

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getTipo() {
        return $this->tipo;
    }

    // setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    // operaciones crud

    // llamamos al metodo del padre y le entregramos la constate con los datos de la tablas en la base de datos, esto es lo mismo para la cinco operaciones basicas.

    public function crear() {
        return parent::crear(TABLA_USUARIO); 
    }

    public function modificar() {
        return parent::modificar(TABLA_USUARIO);
    }

    public function eliminar() {
        return parent::eliminar(TABLA_USUARIO);
    }

    public function buscarPorId() {
        return parent::buscarPorId(TABLA_USUARIO);
    }

    public function listarTodos() {
        return parent::listarTodos(TABLA_USUARIO);
    }

    // ejemplo de operacion personalizada

    public function buscarPorNombre($usuario) {
        $sql = "SELECT * FROM  " . TABLA_USUARIO['nombre'] . " WHERE " . split(",", TABLA_USUARIO['campos'])[1] . " = '" . $usuario . "';";
        return parent::ejecutarSentenciaSQL($sql);
    }

    // otro ejemplo en duro
    public function buscarPorNombreDos($usuario) {
        $sql = "SELECT * FROM usuario WHERE nombre = '" . $usuario . "';";
        return parent::ejecutarSentenciaSQL($sql);
    }

    public function logear($usuario, $contrasena) {

        $resultado = $this->buscarPorNombre($usuario);

        $user = mysql_fetch_row($resultado);

        if ($user != "") {

            if ($user[2] == $contrasena) {
                return 0;
            } else {
                return 1;
            }
        }

        return 2;
        /*
         * 0 = OK
         * 1 = Contraseña o usuario incorrectos
         * 2 = usuario inexistente
         */
    }

}
