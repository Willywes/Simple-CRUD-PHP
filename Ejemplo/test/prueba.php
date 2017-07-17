<?php

require_once('../modelo/Usuario.php');

$usuario = new Usuario();
$usuario->Usuario("1","willywes","1234","ADMIN");

// probamos la sentencias en modo echo

echo("SENTENCIA CREATE");
echo("<br>");
echo($usuario->crear());
echo("<hr>");
echo("<br>");
echo("SENTENCIA UPDATE");
echo("<br>");
echo $usuario->modificar();
echo("<hr>");
echo("<br>");
echo "SENTENCIA DELETE";
echo("<br>");
echo $usuario->eliminar();
echo("<hr>");
echo("<br>");
echo "SENTENCIA READ";
echo("<br>");
echo $usuario->buscarPorId();
echo("<hr>");
echo("<br>");
echo "SENTENCIA READ_ALL";
echo("<br>");
echo $usuario->listarTodos();
