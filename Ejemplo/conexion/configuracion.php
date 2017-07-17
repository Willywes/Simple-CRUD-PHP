<?php

/*
* Creado por Alejandro Isla - Willywes 2017
* @willywes_
* http://www.alejandroisla.tk
* http://www.tucreativa.cl
* https://github.com/Willywes
*/

/* CONFIGURACIÓN DE TABLAS 
*  ------------------------
*  Debes agregar las tablas a manipular en la pase de datos, agregar al arreglo:
*  nombre -> define el nombre de la tabla en la base de datos
*  campos -> definr el nombre de cada columna o campos de la tabla en la base de datos.
*  estos deben estar separados por comas
*
*  EJEMPLO
*
*  const NOMBRE_DE_LA_CONSTANTE = array(
*     'nombre' => 'nombre_de_la_tabla',
*     'campos' => 'campo1, campos2, campo3, campo4'
*  );
*
*  NOTA : los campos del arreglo deben ser identicos a los de la base de datos
*/

// ejemplo de una tabla de nombre usuario que tiene 4 campos : id, nombre, clave, tipo de usuario

const TABLA_USUARIO = array(
    'nombre' => 'usuario',
    'campos' => 'id, nombre, clave, tipo_usuario'
);
