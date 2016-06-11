<?php
session_start();
//if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");
if(!isset($_GET['IdMembresia']) and $_GET['IdMembresia']=='') $_GET['IdMembresia']=0;
?>
<?php
require("xajax_variablelinguistica.php");
require("../header_new.php"); 
$xajax->printJavascript();
?>
<script>
function generaMembresia(id,seleccionado){
xajax_genera_cbomembresia(id,seleccionado);
}
</script>
<h2 class="art-postheader">VARIABLE LINGUISTICA</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>VARIABLE LINGUISTICA</title>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
  form = formMantVariable;
  error_message = "Hay errores en su formulario!\nPor favor, haga las siguientes correciones:\n\n";

  check_input("txtNombre", 1, "El regla debe tener un nombre");
  
  if (error == true) {
    alert(error_message);
    return false;
  } else {
    submitted = true;
    return true;
  }
}
//-->
</script>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
function genera_cbotipomembresia($seleccionado)
{
	
	require("../negocio/cls_tipomembresia.php");
	$obj= new clsTipoMembresia();
	$rst= $obj->consultar();

	echo "<select name='cboTipoMembresia' id='cboTipoMembresia'>";
	while($registro=$rst->fetch())
	{
		$seleccionar="";
		if($registro[0]==$seleccionado) 
		$seleccionar="selected";
		echo "<option  value='".$registro[0]."' ".$seleccionar.">".$registro[1]."</option>";
	}
	echo "</select>";
}
function genera_cbotipocriterio($seleccionado)
{
	
	require("../negocio/cls_tipocriterio.php");
	$obj= new clsTipoCriterio();
	$rst= $obj->consultar();

	echo "<select name='cbotipoCriterio' id='cbotipoCriterio' onChange='generaMembresia(this.value)'>";
	while($registro=$rst->fetch())
	{
		$seleccionar="";
		if($registro[0]==$seleccionado) 
		$seleccionar="selected";
		echo "<option  value='".$registro[0]."' ".$seleccionar.">".$registro[1]."</option>";
	}
	echo "</select>";
}
?>
<BR>
<div id="centralPanel">
	<div class="rigthText">
<fieldset>
<legend> <strong>DATOS VARIABLE LINGUISTICA</strong></legend>

<form action="../negocio/cont_variablelinguistica.php?accion=<?php echo $_GET['accion'];?>&IdMembresia=<?php if(isset($_GET['IdMembresia'])) echo $_GET['IdMembresia'];?>" method='POST' onSubmit="return check_form(formMantVariable);" name="formMantVariable">
<input type='hidden' name = 'txtIdVariable' value = '<?php if($_GET['accion']=='ACTUALIZAR')
echo $_GET['IdVariable'];?>'>
<?php
require("../datos/cado.php");
if($_GET['accion']=='ACTUALIZAR'){
//require("../negocio/cls_variablelinguistica.php");
$objVariable = new clsVariableLinguistica();
$rst = $objVariable->buscar($_GET['IdVariable']);
$dato = $rst->fetchObject();
}
?>
<table width="498" class="tablaint" align="center">
<tr>
	<td>NOMBRE : </td>
	<td><input type='text' id='txtNombre' name = 'txtNombre' 
	value = '<?php if($_GET['accion']=='ACTUALIZAR')
	echo utf8_encode($dato->nombre);?>' style="text-transform:uppercase" maxlength="50" size="50"></td>
</tr>
<tr>
	<td>VALOR INICIAL : </td>
	<td><input type='text' id='txtValorInicial' name = 'txtValorInicial' 
	value = '<?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->valorinicial;?>' style="text-transform:uppercase" maxlength="5" size="5"></td>
</tr>
<tr>
	<td>VALOR MEDIO : </td>
	<td><input type='text' id='txtValorMedio' name = 'txtValorMedio' 
	value = '<?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->valormedio;?>' style="text-transform:uppercase" maxlength="5" size="5"></td>
</tr>
<tr>
	<td>VALOR FINAL : </td>
	<td><input type='text' id='txtValorFinal' name = 'txtValorFinal' 
	value = '<?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->valorfinal;?>' style="text-transform:uppercase" maxlength="5" size="5"></td>
</tr>
<tr>
	<td width="147">TIPO MEMBRESIA:</td>
	<td width="339"><?php if($_GET['accion']=='ACTUALIZAR')
	echo genera_cbotipomembresia($dato->idtipomembresia); else genera_cbotipomembresia(0)?></td>
</tr>
<tr <?php if(isset($_GET['IdMembresia'])) echo 'style="display:none"';?>>
	<td width="147">TIPO CRITERIO: </td>
    <td width="339"><?php if($_GET['accion']=='ACTUALIZAR')
	echo genera_cbotipocriterio($dato->idtipocriterio); else genera_cbotipocriterio(0)?></td>
</tr>
<tr>
      <td>MEMBRESIA:</td>
      <td><div id="divmembresia"><select id="cboMembresia" name="cboMembresia"><option value="0">TODOS</option>
	  </select></div></td>
</tr>
<tr>
	<th colspan="2"><input type='submit' name = 'grabar' value='GRABAR'> <input type='button' name = 'cancelar' value='CANCELAR' 
	onClick="javascript:window.open('<?php if(isset($_GET['IdMembresia'])) echo 'list_variablelinguistica.php?IdMembresia='.$_GET['IdMembresia']; else echo 'list_variablelinguistica.php';?>','_self')"></th>
</tr>

</table>
</form>

<script>
<?php if($_GET['accion']=='ACTUALIZAR'){?>
generaMembresia(<?php echo $dato->idtipocriterio;?>,<?php echo $dato->idmembresia;?>);
<?php }else{?>
	<?php if(isset($_GET['IdMembresia'])){?>
	generaMembresia(0,<?php echo $_GET['IdMembresia'];?>);
	<?php }else{?>
	generaMembresia(1);
	<?php }?>
<?php }?>
</script>
 </fieldset>
	</div>
</div>
</body>
</html>
<?php
require("../footer_new.php");
?>