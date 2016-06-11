<?php
class clsConvocatoria
{
function insertar($nombre, $fechaconvocatoria, $fechafinal, $idcargo, $vacante)
 {
   $sql = "INSERT INTO CONVOCATORIA(nombre, fechaconvocatoria, fechafinal ,idcargo, 
   vacantes, estado) VALUES(UPPER('" . $nombre . "'), '".$fechaconvocatoria."', '".$fechafinal."', 	
   '".$idcargo."', '".$vacante."','N')";
   global $cnx;
   return $cnx->query($sql);   	
 }

function obtenerLastId()
 {
   $sql = "SELECT LAST_INSERT_ID() as idconvocatoria";
   global $cnx;
   return $cnx->query($sql);  	 	
 }

function actualizar($idconvocatoria,$nombre, $fechaconvocatoria, $fechafinal, $idcargo, $vacante)
 {
   $sql = "UPDATE CONVOCATORIA SET nombre=UPPER ('".$nombre."'), 
   fechaconvocatoria='$fechaconvocatoria',fechafinal=$fechafinal, idcargo=$idcargo, vacantes=$vacante WHERE idconvocatoria = ".$idconvocatoria ;
   global $cnx;
   return $cnx->query($sql);   	 	
 }

function eliminar($idconvocatoria)
 {
/*   $sql = "DELETE FROM CARGO WHERE idcargo = " . $idcargo;*/
     $sql = "UPDATE CONVOCATORIA SET estado='A' WHERE idconvocatoria = " . $idconvocatoria ;
	global $cnx;
   return $cnx->query($sql);   	 	
 }
 
function vaciar()
 {
   $sql = "DELETE FROM CONVOCATORIA";
   global $cnx;
   return $cnx->query($sql);  	 	
 }

function consultar()
 {
   $sql = "SELECT 
   idconvocatoria,nombre,fechaconvocatoria,CV.fechafinal,CV.idcargo,C.descripcion,vacantes,CV.estado 
   FROM CONVOCATORIA CV inner join cargo C on CV.idcargo=C.idcargo WHERE CV.estado='N'
   and fechafinal>=NOW()" ;
  
   global $cnx;
   return $cnx->query($sql);  	 	
 }

function consultarbusqueda($puesto,$fecha_inicio,$fecha_final,$cargo)
{
   $sql = "SELECT 		
   idconvocatoria,nombre,fechaconvocatoria,CV.fechafinal,CV.idcargo,C.descripcion,vacantes,CV.estado 
   FROM CONVOCATORIA CV inner join cargo C on CV.idcargo=C.idcargo WHERE CV.estado='N' 
   and fechafinal>=NOW()";
   
   if($puesto!="")
   {
   $sql=$sql." and nombre like '%".$puesto."%'";
   }
   if($fecha_inicio!="")
   {
   $sql=$sql." and fechaconvocatoria>='".$fecha_inicio."'";
   }
   if($fecha_final!="")
   {
   $sql=$sql." and CV.fechafinal>='".$fecha_final."'";
   }
    if($cargo!=0)
   {
   $sql=$sql." and CV.idcargo=".$cargo;
   }

   global $cnx;
   return $cnx->query($sql); 
   //echo $sql;
}

function consultarvengentes()
 {
   $sql = "SELECT idconvocatoria,nombre,fechaconvocatoria,fechafinal,idcargo,vacantes,estado 
   FROM CONVOCATORIA WHERE estado='N' and fechafinal>=NOW()";
   global $cnx;
   return $cnx->query($sql);  	 	
 }


function list_convocatoria()
 {
	   $sql = "SELECT idconvocatoria, nombre, fechaconvocatoria, fechafinal, descripcion, vacantes 	
	   FROM CONVOCATORIA C INNER JOIN CARGO CG ON C.idcargo=CG.idcargo 
	   where fechafinal >=now()
	   ORDER BY idconvocatoria ,nombre, fechaconvocatoria,fechafinal, descripcion, vacantes; ";
			 
   global $cnx;
   return $cnx->query($sql);  	 	
 }
 
function buscar($idconvocatoria)
 {
   $sql = "SELECT idconvocatoria,nombre,fechaconvocatoria,fechafinal, idcargo,vacantes,estado FROM CONVOCATORIA WHERE idconvocatoria=".$idconvocatoria;
   global $cnx;
   return $cnx->query($sql);   	 	
 }
 
 function asignar_examen_convocatoria($idconvocatoria,$idexamen)
 {
 $sql="INSERT INTO exaconvocatoria(id_exaconocimiento,idconvocatoria) values('".$idexamen."','".$idconvocatoria."')";
   global $cnx;
   return $cnx->query($sql);  
 
 }
 
 function obtenerultimoid()
 {
 $sql="select max(idconvocatoria) from convocatoria";
   global $cnx;
   $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
  
 }
 
 function consultarpostulacion($idconvocatoria,$idpostulante)
 {
 $sql="select count(*) from solicitudtrabajo where idconvocatoria='".$idconvocatoria."' and idpostulante=".$idpostulante;
   global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }
 
  function consultarsolicitud($idconvocatoria,$idpostulante)
 {
 $sql="select situacion from solicitudtrabajo where idconvocatoria='".$idconvocatoria."' and idpostulante=".$idpostulante;
   global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }
 
   function consultaridsolicitud($idconvocatoria,$idpostulante)
 {
 $sql="select idsolicitud from solicitudtrabajo where idconvocatoria='".$idconvocatoria."' and idpostulante=".$idpostulante;
   global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }
 
 function consultarexamenconvocatoria($idconvocatoria)
 {
 $sql="select id_exaconocimiento from exaconvocatoria where idconvocatoria=".$idconvocatoria;
 global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }
 
 function consultardioexamen($idsolicitud)
 {
 if($idsolicitud!="")
 {
 $sql="select count(*) from puntaje_exacon where idsolicitud=".$idsolicitud;
 global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }else{
  return 0;
 }
 }
 
  function consultardiotest($idpostulante,$idconvocatoria)
 {
 $sql="select count(*) from puntaje where idpostulante=".$idpostulante." and idconvocatoria=".$idconvocatoria;
 global $cnx;
  $rst=$cnx->query($sql);  
   $valor=$rst->fetch();
   return $valor[0];
 }
 
}
?>