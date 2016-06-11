<?php
session_start();
/*if(!isset($_SESSION['IdUsuario_SA']))
{
	header("location: ../presentacion/login.php?error=1");
}*/

require("../datos/cado.php");
include_once("cls_respuesta.php");
include_once("cls_membresia.php");
require("../negocio/cls_tipocriterio.php");

controlador($_GET['accion']);

function controlador($accion)
{
  $objRespuesta = new clsRespuesta();

  if($accion=='NUEVO'){
	  
	  $objTipoCriterio = new clsTipoCriterio();
	  $objMembresia = new clsMembresia();
	  	try{
		global $cnx;
		$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$cnx->beginTransaction();
		$objRespuesta->eliminar(NULL,$_POST['txtIdPersona']);
		$rstTC = $objTipoCriterio->buscar(NULL);
		while($datoTC = $rstTC->fetchObject()){
			$rst=$objMembresia->buscarxTipoCriterioTest($datoTC->idtipocriterio);
			while($datomembresia=$rst->fetchObject()){
				$idmembresia=$datomembresia->idmembresia;
				if($datomembresia->tipocontrol=='O'){
					eval("\$valoropt=split('-',\$_POST['optg".$idmembresia."']);");
					eval("if(\$_POST['optg".$idmembresia."'])	\$objRespuesta->insertar(".$_POST['txtIdPersona'].", ".$idmembresia.",\$valoropt[0],\$valoropt[1]);");
				}else{
					eval("\$objRespuesta->insertar(".$_POST['txtIdPersona'].", ".$idmembresia.",0,\$_POST['txt".$idmembresia."']);");
				}
			}
		}

			$cnx->commit(); 
			//header('Location: ../presentacion/resultadofinal.php');
			header('Location: ../presentacion/resultado_paciente.php?idpersona='.$_POST['txtIdPersona']);
			return 1;
		} catch (Exception $e) { 
			$cnx->rollBack(); 
			echo "Error de Proceso en Lotes: " . $e->getMessage();
		}   
	 }
}
?>