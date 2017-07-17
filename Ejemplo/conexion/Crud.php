<?php

/*
* Creado por Alejandro Isla - Willywes 2017
* @willywes_
* http://www.alejandroisla.tk
* http://www.tucreativa.cl
* https://github.com/Willywes
*/


require_once("Conexion.php"); // requerimos la Conexión a la base de datos.
require_once("configuracion.php"); // requerimos el archivo de configuración.

//NOTA AGREGUE UN RETURN PARA MOSTRAR LA SENTENCIA EN LA PRUEBA EN VEZ DE MANDARLA A LA BASE DE DATOS, para utilizarla con la base de datos remover el return antes de la variable $sql de cada funcion.

class Crud {

    public function crear($tabla) {

        $nombreTabla = $tabla['nombre']; //traemos el nombre de la tabla.
        $camposTabla = $tabla['campos']; //traemos todos los nombres de los campos de la tabla.
        $datosObjeto = implode("','", (array) $this); // traemos los atributos del objeto y los dejamos como string separados por comas.

        // como la id variable es autoincrementable lo seteamos vacio, esta opcion es opcional, decomentar para utilizar.
        //$datosObjeto[0] = ''; 

        //generamos la sentencia. 
        return $sql = "INSERT INTO " . $nombreTabla . " (" . $camposTabla . ") VALUES ('" . $datosObjeto . "');";

        // la enviamos a la base de datos.
        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;
    }

    public function modificar($tabla) {

        $nombreTabla = $tabla['nombre']; //traemos el nombre de la tabla.
        $camposTabla = split(",", $tabla['campos']); // creamos un arreglo con los nombres de los campos.
        $datosCobinados = array_combine($camposTabla, (array) $this); // asignamos a ese arreglos los atributos del objeto.

        $nombreId = key($datosCobinados);
        $generarArray = array(); // un arreglo con para generar las sentencias
        $valorId; // para guardar el id

        foreach ($datosCobinados as $key => $value) {
            if ($key != $nombreId) {
                array_push($generarArray, $key . " = '" . $value . "' ");
            } else {
                $valorId = $key . " = '" . $value . "'";
            }
        }

        $datosObjeto = implode(",", (array) $generarArray); // creamos la sentencia set

        return $sql = "UPDATE " . $nombreTabla . " SET " . $datosObjeto . " WHERE " . $valorId . ";";

        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;
    }

    public function eliminar($tabla) {

        $nombreTabla = $tabla['nombre']; //traemos el nombre de la tabla
        $camposTabla = split(",", $tabla['campos']); // creamos un arreglo con los nombres de los campos
        $datosCobinados = array_combine($camposTabla, (array) $this); // asignamos a ese arreglos los atributos del objeto
        $nombreId = key($datosCobinados);
        $valorId = $nombreId . " = '" . $datosCobinados[$nombreId] . "'";

        return $sql = "DELETE FROM " . $nombreTabla . " WHERE " . $valorId . ";";

        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;
    }

    public function buscarPorId($tabla) {

        $nombreTabla = $tabla['nombre']; //traemos el nombre de la tabla
        $camposTabla = split(",", $tabla['campos']); // creamos un arreglo con los nombres de los campos
        $datosCobinados = array_combine($camposTabla, (array) $this); // asignamos a ese arreglos los atributos del objeto
        $nombreId = key($datosCobinados);
        $valorId = $nombreId . " = '" . $datosCobinados[$nombreId] . "'";

        return $sql = "SELECT * FROM " . $nombreTabla . " WHERE " . $valorId . ";";

        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;  
    }

    public function listarTodos($tabla) {

        $nombreTabla = $tabla['nombre']; //traemos el nombre de la tabla
        return $sql = "SELECT * FROM " . $nombreTabla . ";";

        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;
    }
    

    // esta función permite enviar sentencias personalidas a la base de datos
    public function ejecutarSentenciaSQL($sql) {

        return $sql;

        $conexion = new Conexion();
        $respuesta = $conexion->generarTransaccion($sql);
        return $respuesta;
    }

}
