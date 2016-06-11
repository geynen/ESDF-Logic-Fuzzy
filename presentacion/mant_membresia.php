<?php
session_start();
//if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");
require("../header_new.php");
?>
<h2 class="art-postheader">MEMBRESIA</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>MEMBRESIA</title>
<script language="javascript"><!--
var form = "";
var submitted = false;
var error = false;
var error_message = "";

function check_input(field_name, field_size, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value.length < field_size) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}

function check_select(field_name, field_default, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value == field_default) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}

function check_form(form_name) {
  if (submitted == true) {
    alert("Ya ha enviado el formulario. Pulse Aceptar y espere a que termine el proceso.");
    return false;
  }

  error = false;
  form = formMantMembresia;
  error_message = "Hay errores en su formulario!\nPor favor, haga las siguientes correciones:\n\n";

  check_input("txtDescripcion", 1, "El membresia debe tener un nombre");
  
  if (error == true) {
    alert(error_message);
    return false;
  } else {
    submitted = true;
    return true;
  }
}
//--></script>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
</p>
</p>
<div id="centralPanel">
	<div class="centrarText">
<form action=<?php echo '../negocio/cont_membresia.php?accion='.$_GET['accion']?> method='POST' onSubmit="return check_form(formMantMembresia);" name="formMantMembresia">
  <input type='hidden' name = 'txtIdMembresia' value = '<?php if($_GET['accion']=='ACTUALIZAR')
echo $_GET['IdMembresia'];?>'>
  <?php
require("../datos/cado.php");
if($_GET['accion']=='ACTUALIZAR'){
require("../negocio/cls_membresia.php");
$objMembresia = new clsMembresia();
$rst = $objMembresia->buscar($_GET['IdMembresia']);
$dato = $rst->fetchObject();
}?>
<fieldset> 
<legend align="left"> <strong> REGISTRO DE MEMBRESIA </strong></legend>
<table width="515" border="0" align="center">
<tr>
	<td width="173">DESCRIPCI&Oacute;N </td>
	<td width="332"><input type='text'id='txtDescripcion'name='txtDescripcion' 
	value = '<?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->descripcion;?>' style="text-transform:uppercase" maxlength="50" size="50"></td>
</tr>
<tr> 
	<td> COMENTARIO </td>
	<td align="left"><textarea name="txtcomentario" cols="20" id="txtcomentario" style="text-transform:uppercase"><?php if($_GET['accion']=='ACTUALIZAR') echo $dato->comentario;?></textarea>	
	</td>
</tr>
<tr>
	<td> TIPO DE CRITERIO </td>
    <td align="left"> 
    <?php
	function genera_cboTipoCriterio($seleccionado)
	{
	require("../negocio/cls_tipocriterio.php");
	$objTipoCriterio = new clsTipoCriterio();
	$rst2=$objTipoCriterio->consultar();

	echo "<select name='cboTipoCriterio' id='cboTipoCriterio'>";
	while($registro=$rst2->fetch())
	{
		$seleccionar="";
		if($registro[0]==$seleccionado) $seleccionar="selected";
		echo "<option value='".$registro[0]."' ".$seleccionar.">".utf8_encode($registro[1])."</option>";
	}
	echo "</select>";
}
?>
<?php 
	if($_GET['accion']=='ACTUALIZAR') echo genera_cboTipoCriterio($dato->idtipocriterio); 
	else echo genera_cboTipoCriterio(0);?>    </td>
</tr>
<tr>
	<td> CRITERIO </td>
	<td align="left"><label>
	<select name="cboEntrada">
    <option  <?php if($_GET['accion']=="ACTUALIZAR" & $dato->tipo=='I'){
			echo "selected='selected'";}?> value='I'>ENTRADA</option>
    <option <?php if($_GET['accion']=="ACTUALIZAR" & $dato->tipo=='O'){
			echo "selected='selected'";}?> value='O'>SALIDA</option>
	 </select>
	</label></td>
</tr>
<tr> 
	<td> TIPO DE ENTRADA </td> 
	<td align="left"><label>
	<select name="cbocontrol">
       <?php
		if($_GET['accion']=="ACTUALIZAR" & $dato->tipocontrol=='O'){
			echo "<option selected='selected' value='O'>OPCION</option>
			<option value='V'>VALOR</option>";
        }
		else{
	        echo "<option selected='selected' value='V'>VALOR</option>
	  		<option id='O' value='O'>OPCION</option>";  
		  }
	?>
	 </select>
	</label></td>
</tr>
<tr>
  <th colspan="2">
    <input type='submit' name = 'grabar' value='GRABAR'> 
    <input type='button' name = 'cancelar' value='CANCELAR' onClick="javascript:window.open('list_membresia.php','_self')"> </th>
</tr>
</table>
</fieldset>
</form>
	</div>
</div>
</body>
</html>
<?php
require("../footer_new.php");
?>