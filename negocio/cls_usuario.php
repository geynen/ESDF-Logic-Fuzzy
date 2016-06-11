<?php
require("cls_persona.php");
class clsUsuario extends clsPersona
{
function insertarUsuario($idpersona, $login, $clave, $idtipousuario)
 {
   $sql = "INSERT INTO Usuario VALUES(NULL, $idpersona, '$login', '$clave', $idtipousuario)";

   global $cnx;
   return $cnx->query($sql);   	
 }  
 
function actualizarUsuario($idpersona, $login, $clave)
 {
   $sql = "UPDATE Usuario SET login='$login', clave='$clave' WHERE idpersona=$idpersona";

   global $cnx;
   return $cnx->query($sql);   	
 }
function logeo($Usuario, $Clave)
 {
   $sql = "SELECT idpersona,login,clave,idtipousuario FROM usuario WHERE estado='N'";
   if(isset($Usuario) and isset($Clave))
	$sql = $sql . " AND login = '$Usuario' AND clave = '$Clave'";

   global $cnx;
   return $cnx->query($sql);   	
 }  
}
?>