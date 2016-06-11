<?php
session_start();
if($_SESSION['IdTipo']!=1 and $_SESSION['IdTipo']!=2) header("location: ../Inicio.php");
//VERIFICO TIPO DE PERSONA P->PACIENTE Y M->MEDICO (INCLUYE AL ADMINISTRADOR)
if(isset($_GET['tipo'])) $tipopersona=$_GET['tipo']; else $tipopersona='P';
?>
<?php
require("../datos/cado.php");
//require_once("../negocio/cls_persona.php");
require("xajax_persona.php");
if($_SESSION['IdTipo']==1){
	require("../header_new.php");
}else{
	require("../header_usu_new.php");
}
$xajax->printJavascript();
?>
<script>
function listadopersonas(){
divParametros.style.display="";
divlistapersona.style.display="";
<?php $flistadopersonatest->printScript(); ?>
}
</script>
<h2 class="art-postheader">PACIENTES</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>LISTADO DE PACIENTES</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="listadopersonas()">
		<div id='divParametros'>
<fieldset>
<legend align="left"><strong>CRITERIOS DE B&Uacute;SQUEDA :</strong></legend>
<table border="0" class="tablaOculta">
  <tr>
    <td align="left">APELLIDOS Y NOMBRES :</td>
    <td> <input name="txtApellidosyNombres" type="text" id="txtApellidosyNombres" style="text-transform:uppercase">
	</td>
	<td><input name = 'BUSCAR' type='button' id="BUSCAR" value = 'BUSCAR' onClick="listadopersonas()"> </td>
  </tr>
</table>

</fieldset>
</div>
	<div class="centrarText">
	<div id="divlistapersona">
<div id="centralPanel">
<fieldset>
<legend align="left"><strong>LISTA :</strong></legend>
<div id="divReporte"> </div>
</fieldset>
	</div>
</div>
 </div>
</body>
</html>
<?php
require("../footer_new.php");
?>