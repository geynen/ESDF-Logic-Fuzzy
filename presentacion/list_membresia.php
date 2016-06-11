<?php
session_start();
//if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");
?>
<?php
require("xajax_membresia.php");
require("../header_new.php"); 


$xajax->printJavascript();
?>
<script>
function inicio(){
<?php $flistarmembresias->printScript(); ?>
}
function listarmembresias(){
<?php $flistarmembresias->printScript(); ?>
}
</script>
<h2 class="art-postheader">MEMBRESIAS</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>MEMBRESIAS</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="inicio()" class="body">
<p>
   <?php
function genera_cboTipoCriterio($seleccionado)
	{

	require("../negocio/cls_tipocriterio.php");
	$objTipoCriterio = new clsTipoCriterio();
	$rst2=$objTipoCriterio->consultar();

	echo "<select name='cboTipoCriterio' id='cboTipoCriterio'>
	<option value=0>TODOS</option>";
	while($registro=$rst2->fetch())
	{
		$seleccionar="";
		if($registro[0]==$seleccionado) $seleccionar="selected";
		echo "<option value='".$registro[0]."' ".$seleccionar.">".utf8_encode($registro[1])."</option>";
	}
	echo "</select>";
}
?>
<form action="mant_membresia.php?accion=NUEVO" method="POST">
<fieldset>
<legend><strong>CRITERIOS DE B&Uacute;SQUEDA :</strong></legend>
<table width="730" border="0" class="tablaOculta">
  <tr>
    <td width="104">DESCRIPCI&Oacute;N</td>
    <td width="146"><input name="txtDescripcion" type="text" id="txtDescripcion"></td>
    <td width="141">TIPO CRITERIO</td>
    <td width="185"><?php echo genera_cboTipoCriterio(0);?></td>
    <td width="72"><input type="button" name="Submit" value="BUSCAR" onClick="listarmembresias()"></td>
    <td width="56"><input type='submit' name = 'NUEVO' value = 'NUEVO'></td>
  </tr>
</table>
<label></label>
</fieldset>
<!--<div id="centralPanel">-->
<div id="">
	<div class="centrarText">
<fieldset>
    <legend><strong>RESULTADOS :</strong></legend>
	
	<div id="divmembresias">  </div>
  	</fieldset>	
	</div>
</div>
</form>
</body>
</html>
<?php
require("../footer_new.php");
?>