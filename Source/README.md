# Simple CRUD PHP
Esta utilidad sirve para generar un sólo CRUD para todo el proyecto el cual podrá ser utilizado por muchas clases, necesita ser implementado utilizando programación orientada a objectos y esta testeada para MySQL.

# Implementación

## 1. Configuración de conexión
Debes agregar tus credenciales de conexión a la base de datos, esto se hace en el firecho Conexion.php

+ servidor : url o ip del servidor de base de datos MySQL.
+ usuario : nombre del usuario que se conecta a la base de datos.
+ clave : contraseña del usuario que se conecta a la base de datos.
+ basedatos : nombre de la base de datos.

## 2. Configuración de tablas y campos
Debes definir los nombres de tablas y campos en el archivo configuraciones.php:

+ nombre de la constante para ser llamada despúes con algún nombre reprensentativo.
+ nombre de la tabla.
+ campos de la tabla separados por comas.

```
const NOMBRE_DE_LA_CONSTANTE = array(
    'nombre' => 'nombre_de_la_tabla',
    'campos' => 'campo1, campos2, campo3, campo4'
);

```
### Ejemplo

```
const TABLA_USUARIO = array(
    'nombre' => 'usuario',
    'campos' => 'id, nombre, clave, tipo_usuario'
);

```

## 2. Utilización en el modelo.
Debemos Crear una Clase y luego heredar Crud.php desde esta, una vez creados sus constructores, getters y setter, debemos crear las funciones crud extendiendo de la clase Crud y entregarle como parámetro la constante de la tabla correspondiente a la clase creada, tener encuenta que la cantidad de campos deben coincidir con la cantidad de atributos o propiedades de la clase en cuestión y deben estar en el mismo orden aunque no es necesario que tengan los mismos nombres que los campos de la base de datos, solo de bere respetar el orden.

```
class Usuario extends Crud { 

    private $id;
    private $nombre;
    private $contrasena;
    private $tipo;

// Contructores, setters, getter

// metodos CRUD

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
}
```

# NOTA

Para ver una implementación revisa la carpeta de Ejemplo.


# RESULTADO DE SENTENCIAS
![alt Resultado de Sentencias](https://github.com/Willywes/Simple-CRUD-PHP/blob/master/images/res.png)
