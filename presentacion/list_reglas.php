<?php
session_start();
if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");

?>
<?php
require("xajax_reglas.php");
require("../header_new.php"); 

$xajax->printJavascript();
?>
<script>
function inicio(){
<?php $flistarreglas->printScript(); ?>
}
function listarreglas(){
<?php $flistarreglas->printScript(); ?>
}
function generaMembresia(id,idtipo,seleccionado){
xajax_genera_cbomembresia(id,idtipo,seleccionado,'TODOS');
}
</script>
<h2 class="art-postheader">REGLAS</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>REGLA</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="inicio()">
<?php
//FUNCIONES DE MEMBRESIA
function genera_cbotipocriterio($origen,$seleccionado)
{
	
	require("../negocio/cls_tipocriterio.php");
	$obj= new clsTipoCriterio();
	$rst= $obj->consultar();

	echo "<select name='cbotipoCriterio' id='cbotipoCriterio' onChange='generaMembresia(&quot;Input&quot;,this.value);generaMembresia(&quot;Input2&quot;,this.value);generaMembresia(&quot;Output&quot;,this.value);'>
	 <option  value='0' selected>TODOS</option>";
	while($registro=$rst->fetch())
	{
		$seleccionar="";
		if($registro[0]==$seleccionado) 
		$seleccionar="selected";
		echo "<option  value='".$registro[0]."' ".$seleccionar.">".utf8_encode($registro[1])."</option>";
	}
	echo "</select>";
}
?>
<form action="mant_reglas.php?accion=NUEVO" method="POST">
<fieldset>
<legend><strong>CRITERIOS DE B&Uacute;SQUEDA :</strong></legend>
<table width="749" class="tablaOculta">
    <tr>
      <td width="208">REGLAS:</td>
      <td width="149"><input name="txtRegla" type="text" id="txtRegla"></td>
      <td width="208">TIPO CRITERIO:</td>
      <td width="156"><?php echo genera_cbotipocriterio('Input',0);?></td>      
	  </tr><tr>
      <td width="208" align="left">MEMBERSIA ENTRADA 1 </td>
      <td width="149"><div id="divmembresiaInput"><select id="cboMembresiaInput" name="cboMembresiaInput">
	  <option value="0">TODOS</option></select></div></td>
      <td width="208" align="left">MEMBERSIA ENTRADA 2 </td>
      <td width="156"><div id="divmembresiaInput2"><select id="cboMembresiaInput2" name="cboMembresiaInput2">
	  <option value="0">TODOS</option></select></div></td>

      </tr>
    <tr>
      <td>MEMBERSIA SALIDA:</td>
      <td><div id="divmembresiaOutput"><select id="cboMembresiaOutput" name="cboMembresiaOutput">
	  <option value="0">TODOS</option></select></div></td>
      <td colspan="2"><div align="center">
      <input type="button"  name="Submit" value="BUSCAR" onClick="listarreglas()"> 
      <input type='submit' name = 'NUEVO' value = 'NUEVO'>
          </div></td>
      </tr> 
</table>
</fieldset>
<!--<div id="centralPanel">-->
<div id="">
<div class="rigthText">
<fieldset>
      <legend><strong>RESULTADO :</strong></legend>
  <div id="divreglas"></div>
</fieldset>
</div>
</div>
</form>
</body>
</html>
<?php
require("../footer_new.php");
?>