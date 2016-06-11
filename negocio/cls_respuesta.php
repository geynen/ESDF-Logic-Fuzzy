<?php
class clsRespuesta
{
function insertar($idPersona, $idmembresia, $idvariable, $valor)
 {
   $sql = "INSERT INTO RESPUESTAS(idrespuesta, idPersona, idmembresia, idvariable, valor) VALUES(NULL, $idPersona, $idmembresia, $idvariable, $valor)";
   global $cnx;
   return $cnx->query($sql);   	
 }

function obtenerLastId()
 {
   $sql = "SELECT LAST_INSERT_ID() as idrespuesta";
   global $cnx;
   return $cnx->query($sql);  	 	
 }
 //PENDIENTE
function actualizar($idrespuesta, $descripcion)
 {
   $sql = "UPDATE RESPUESTAS SET descripcion=UPPER('" . $descripcion . "'), estado='N' WHERE idrespuesta = " . $idrespuesta ;
   global $cnx;
   return $cnx->query($sql);   	 	
 }

 function eliminar($idrespuesta,$idpersona)
 {
     $sql = "DELETE FROM respuestas WHERE 1=1 ";
	 if(isset($idrespuesta)) $sql.=" and idrespuesta = " . $idrespuesta ;
	 if(isset($idpersona)) $sql.=" and idpersona = " . $idpersona ;
	global $cnx;
   return $cnx->query($sql);   	 	
 }

  //PENDIENTE
function vaciar()
 {
   $sql = "DELETE FROM RESPUESTAS";
   global $cnx;
   return $cnx->query($sql);  	 	
 }
 //PENDIENTE
function consultar()
 {
   $sql = "SELECT idrespuesta, descripcion,estado FROM RESPUESTAS WHERE estado='N'";
   global $cnx;
   return $cnx->query($sql);  	 	
 }

function buscar($idrespuesta,$idpersona,$idmembresia)
 {
   $sql = "SELECT * FROM respuestas WHERE 1=1 ";

    if(isset($idrespuesta)) $sql.=" and idrespuesta=".$idrespuesta;
	if(isset($idpersona)) $sql.=" and idpersona=".$idpersona;
	if(isset($idmembresia)) $sql.=" and idmembresia=".$idmembresia;
	
   global $cnx;
   return $cnx->query($sql);   	 	
 }

function buscarxPersona($idPersona)
 {
   $sql = "SELECT idrespuesta, idPersona, r.idmembresia, c.descripcion as membresia, idvariable, valor FROM respuestas r inner join membresia c on r.idmembresia=c.idmembresia WHERE 1=1";
   if(isset($idPersona)) $sql.=" and idPersona=".$idPersona;
   global $cnx;
   return $cnx->query($sql);   	 	
 } 
 
function resultadofinal()
 {
   $sql = "select distinct P.idpersona, codigo, CONCAT(apellidopaterno,' ',apellidomaterno,' ',nombres) as persona from respuestas R inner join persona P on P.idpersona=R.idpersona";
   global $cnx;
   return $cnx->query($sql);   	 	
 }
}
?>