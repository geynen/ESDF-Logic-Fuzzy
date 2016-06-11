<?php
$manejador="mysql";
$servidor="localhost";
$usuario="root";
$pass="";
$base="bd_chayan";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass,array(PDO::ATTR_PERSISTENT => true));
?>