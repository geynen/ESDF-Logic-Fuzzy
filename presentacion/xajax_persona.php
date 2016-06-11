<?php 
session_start();
/*if(!isset($_SESSION['Usuario_SA']))
{
  header("location: ../presentacion/login.php?error=1");
}*/
require('../xajax/xajax_core/xajax.inc.php');
$xajax= new xajax();
$xajax->configure('javascript URI','../xajax/');
//$xajax->configure('debug', true);//ver errores

require_once("../negocio/cls_persona.php");

function listadopersona($tipopersona,$apellidosynombres){
require("../datos/cado.php");
	$registro.="<table class='tablaint' border='1'>";
	$registro.="<tr>
	  <th class='cabezera'><font size=3> COD </font> </th>
	  <th class='cabezera'><font size=3>  APELLIDOS Y NOMBRES </font></a> </th>		         
	  <th class='cabezera'><font size=3> DNI </FONT> </th>
      <th class='cabezera'><font size=3> SEXO </FONT> </th>
      <th class='cabezera'><font size=3> ESTADO </FONT> </th>
      <th class='cabezera'><font size=3> DIRECCION </FONT> </th>
	  <th class='cabezera'><font size=3> TEL FIJO </FONT> </th>
  	  <th class='cabezera'><font size=3> CELULAR </FONT> </th>
	  <th class='cabezera'><font size=3> EMAIL </FONT> </th>
	  <th class='cabezera' colspan='4'><font size=3> OPERACIONES </FONT> </th>
 
    </tr>";
	
	date_default_timezone_set('America/Lima');
	
    $objPersona= new clsPersona();
	$rst = $objPersona->buscar(NULL,$apellidosynombres,$tipopersona);
	$cont=0;
	while($dato = $rst->fetchObject()){
	   $cont++;
	   $rojo="";
	   if($cont%2) $estilo="par";
	   else $estilo="impar";
	$registro.="<tr class='$estilo'>";
	$registro.="<td align='center'>".$dato->codigo."</td>";
	$registro.="<td align='center'>".$dato->apellidosynombres."</td>";
	$registro.="<td align='center'>".$dato->nrodoc."</td>"; 
	$registro.="<td align='center'>".$dato->sexo."</td>";
	$registro.="<td align='center'>".$dato->estadocivil."</td>";
	$registro.="<td align='center'>".$dato->direccion."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->telefonofijo."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->celular."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->email."&nbsp;</td>";
	/*if($dato->cant==1) {
	$registro.="<td><a href='seleccionarcargo.php?IdPersona=$dato->idpersona'>&nbsp;Aplicar Test</a></td>";}
	else{ $registro.="<td></td>";}	*/
    $registro.="<td><a href='mant_persona.php?accion=ACTUALIZAR&tipo=$tipopersona&IdPersona=$dato->idpersona'>
	<img src='../Imagenes/Editar.GIF' width='58'height='28'border='0'></a></td>";
    $registro.="<td><a href='../negocio/cont_persona.php?accion=ELIMINAR&IdPersona=$dato->idpersona'>
	<img src='../Imagenes/Elimi.GIF' width='58'height='28'border='0'></a></td>";

  $registro.="</tr>";
	}
	$registro.="</table>";
	$registro=utf8_encode($registro);
	$obj=new xajaxResponse();
	$obj->assign("divReporte","innerHTML",$registro);
	return $obj;
}

$flistadopersona= & $xajax->registerFunction("listadopersona");
$flistadopersona->setParameter(0,XAJAX_INPUT_VALUE,'txtTipoPersona');
$flistadopersona->setParameter(1,XAJAX_INPUT_VALUE,'txtApellidosyNombres');

function listadopersonatest($apellidosynombres){
require("../datos/cado.php");
	$registro.="<table class='tablaint' border='1'>";
	$registro.="<tr>
	  <th class='cabezera'><font size=3> COD </font> </th>
	  <th class='cabezera'><font size=3>  APELLIDOS Y NOMBRES </font></a> </th>		         
	  <th class='cabezera'><font size=3> DNI </FONT> </th>
      <th class='cabezera'><font size=3> SEXO </FONT> </th>
      <th class='cabezera'><font size=3> ESTADO </FONT> </th>
      <th class='cabezera'><font size=3> DIRECCION </FONT> </th>
	  <th class='cabezera'><font size=3> TEL FIJO </FONT> </th>
  	  <th class='cabezera'><font size=3> CELULAR </FONT> </th>
	  <th class='cabezera'><font size=3> EMAIL </FONT> </th>
	  <th class='cabezera' colspan='4'><font size=3> OPERACIONES </FONT> </th>
 
    </tr>";
	
	date_default_timezone_set('America/Lima');
	
    $objPersona= new clsPersona();
	$rst = $objPersona->buscar(NULL,$apellidosynombres,'P');
	$cont=0;
	while($dato = $rst->fetchObject()){
	   $cont++;
	   $rojo="";
	   if($cont%2) $estilo="par";
	   else $estilo="impar";
	$registro.="<tr class='$estilo'>";
	$registro.="<td align='center'>".$dato->codigo."</td>";
	$registro.="<td align='center'>".$dato->apellidosynombres."</td>";
	$registro.="<td align='center'>".$dato->nrodoc."</td>"; 
	$registro.="<td align='center'>".$dato->sexo."</td>";
	$registro.="<td align='center'>".$dato->estadocivil."</td>";
	$registro.="<td align='center'>".$dato->direccion."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->telefonofijo."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->celular."&nbsp;</td>";
	$registro.="<td align='center'>".$dato->email."&nbsp;</td>";
    $registro.="<td><a href='test.php?IdPersona=$dato->idpersona'>Aplicar test</a></td>";
  $registro.="</tr>";
	}
	$registro.="</table>";
	$registro=utf8_encode($registro);
	$obj=new xajaxResponse();
	$obj->assign("divReporte","innerHTML",$registro);
	return $obj;
}

$flistadopersonatest= & $xajax->registerFunction("listadopersonatest");
$flistadopersonatest->setParameter(0,XAJAX_INPUT_VALUE,'txtApellidosyNombres');

$xajax->processRequest();
echo"<?xml version='1.0' encoding='UTF-8'?>";
?>