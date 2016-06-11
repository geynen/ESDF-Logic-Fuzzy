<?php
session_start();
//if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");

?>
<?php
require("xajax_variablelinguistica.php");
require("../header_new.php"); 
$xajax->printJavascript();
?>
<script>
function inicio(){
<?php $flistarvariablelinguistica->printScript(); ?>
}
function listarvariablelinguistica(){
<?php $flistarvariablelinguistica->printScript(); ?>
}
function generaMembresia(id,seleccionado){
xajax_genera_cbomembresia(id,seleccionado,'TODOS');
}
</script>
<h2 class="art-postheader">VARIABLES LINGUISTICAS</h2>
<div class="art-postcontent">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>VARIABLES LINGUISTICAS</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="inicio()">
<br>
<?php
function genera_cbotipocriterio($seleccionado)
{
	
	require("../negocio/cls_tipocriterio.php");
	$obj= new clsTipoCriterio();
	$rst= $obj->consultar();

	echo "<select name='cbotipoCriterio' id='cbotipoCriterio' onChange='generaMembresia(this.value)'>
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
<form action="mant_variablelinguistica.php?accion=NUEVO&IdMembresia=<?php if(isset($_GET['IdMembresia']) and $_GET['IdMembresia']>0) echo $_GET['IdMembresia'];?>" method="POST">
<?php 
if(isset($_GET['IdMembresia'])){
$objMembresiaNombre = new clsMembresia();
$rst=$objMembresiaNombre->buscar($_GET['IdMembresia']);
$dato=$rst->fetchObject();
$membresia=$dato->descripcion;
}
?>
<fieldset>
<legend><strong><?php if(isset($_GET['IdMembresia']) and $_GET['IdMembresia']>0) echo 'MEMBRESIA: '.$membresia; else echo 'CRITERIOS DE B&Uacute;SQUEDA :';?></strong></legend>
<table class="tablaOculta">
<tr valign="middle">
<td <?php if(isset($_GET['IdMembresia']) and $_GET['IdMembresia']>0) echo 'style="display:none"';?>>
<table class="tablaOculta">
    <tr>
      <td>VARIABLE:</td>
      <td><input name="txtRegla" type="text" id="txtRegla"></td>
      <td >TIPO CRITERIO</td>
      <td> <?php echo genera_cbotipocriterio(0);?></td>
      <td>MEMBRESIA:</td>
      <td><div id="divmembresia"><select id="cboMembresia" name="cboMembresia"><option value="<?php if(isset($_GET['IdMembresia']) and $_GET['IdMembresia']>0) echo $_GET['IdMembresia']; else echo '0';?>">TODOS</option></select></div></td>
      <td align="left" ><div align="center">
        <input type="button"  name="Submit" value="BUSCAR" onClick="listarvariablelinguistica()"> 
      </div></td>
	<!--  <td width="93" >
	  <input type='button' name = 'cancelar' value='VARIABLES' onClick="javascript:window.open('mant_variablelinguistica2.php','_self')">
	  <a href="mant_variablelinguistica2.php"></a> </td>
	 </tr>-->
    </tr>
  </table>
</td>
<td valign="bottom"><input type='submit' name = 'NUEVO' value = 'NUEVO'></td>
</tr>
</table>
</fieldset>
<!--<div id="centralPanel">-->
<div id="">
	<div class="rigthText">

<fieldset>
      <legend><strong>RESULTADO :</strong></legend>
  <div id="divvariablelinguistica"></div>
  <?php 
  if(isset($_GET['IdMembresia']) and $_GET['IdMembresia']>0){
	  $objMembresia = new clsMembresia();
	  $objVariable = new clsVariableLinguistica();
	  $idmembresia=$_GET['IdMembresia'];
	  require("../presentacion/graficodifuso.php");
  }?>
</fieldset>
		</div>
</div>
</form>
</body>
</html>
<?php
require("../footer_new.php");
?>