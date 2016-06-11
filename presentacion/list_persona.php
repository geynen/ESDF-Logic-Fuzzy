<?php
session_start();
if($_SESSION['IdTipo']!=1 and $_SESSION['IdTipo']!=2) header("location: ../Inicio.php");
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
//VERIFICO TIPO DE PERSONA P->PACIENTE Y M->MEDICO (INCLUYE AL ADMINISTRADOR)
if(isset($_GET['tipo'])) $tipopersona=$_GET['tipo']; else $tipopersona='P';
$xajax->printJavascript();
?>
<script>
function listadopersonas(){
divParametros.style.display="";
divlistapersona.style.display="";
<?php $flistadopersona->printScript(); ?>
}
listadopersonas();
</script>
<h2 class="art-postheader"><?php if($tipopersona=='P'){echo 'LISTADO DE PACIENTES';}else{echo 'LISTADO DE M&Eacute;DICOS';}?></h2>
<div class="art-postcontent">
<html>
<head>
<title>LISTADO DE PERSONAS</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="listadopersonas()">

<form id="form1" name="form1" method="post" action="mant_persona.php?accion=NUEVO&tipo=<?php echo $tipopersona;?>">
<input type="hidden" id="txtTipoPersona" name="txtTipoPersona" value="<?php echo $tipopersona;?>">
		<div id='divParametros'>
<fieldset>
<legend align="left"><strong>CRITERIOS DE BUSQUEDA :</strong></legend>
<table border="0" class="tablaOculta">
  <tr>
    <td align="left">APELLIDOS Y NOMBRES :</td>
    <td> <input name="txtApellidosyNombres" type="text" id="txtApellidosyNombres" style="text-transform:uppercase" size="60">
	</td>
	<td><input name = 'BUSCAR' type='button' id="BUSCAR" value = 'BUSCAR' onClick="listadopersonas()"> </td>
	<td> <input type='submit' name = 'NUEVO2' value = 'NUEVO'></td>
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
</form>
</body>
</html>
<?php
require("../footer_new.php");
?>