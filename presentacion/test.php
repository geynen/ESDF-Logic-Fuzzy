<?php
session_start();
if($_SESSION['IdTipo']==1){
	require("../header_new.php");
}else{
	require("../header_usu_new.php");
}
/*if(!isset($_SESSION['Usuario_SA']))
{
	header("location: ../presentacion/login.php?error=1");
}*/
if(!isset($_GET['IdPersona'])){
	$_GET['IdPersona']=1;	
}
function obtenerEdad( $fecha ) {//YYYY-MM-DD
    list($Y,$m,$d) = explode("/",$fecha);
    $años = ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	return $años;
	/*if($años>=1){
		return $años.($años>1?' años':' año');
	}else{
		$meses = ( date("m") < $m ? date("m")-$m-1 : date("m")-$m );
		if($meses>=1){
			return $meses.($meses>1?' meses':' mes');
		}else{
			$dias = ( date("d") < $d ? date("d")-$d-1 : date("d")-$d );
			return $dias.($dias>1?' días':' día');
		}
	}*/
}
?>
<h2 class="art-postheader">TEST</h2>
<div class="art-postcontent">
<html>
<head>
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css">
<title>TEST</title>
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
  form = formMantTest;
  error_message = "Hay errores en su formulario!\nPor favor, haga las siguientes correciones:\n\n";

  check_input("txtDescripcion", 1, "El test debe tener un nombre");
  
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
<br>
<div id="centralPanel">
	<div class="rigthText">
<table width="654" height="123" border="0" align="center">
  <tr>
    <td>
	<?php 
require("../datos/cado.php");
require_once("../negocio/cls_persona.php");
$objPersona= new clsPersona();
$rstP = $objPersona->buscar($_GET['IdPersona'],'');
$datoP=$rstP->fetchObject();
echo '<b>PERSONA :</b> '.$datoP->apellidosynombres.'<br />';
?>
<form action=<?php echo '../negocio/cont_test.php?accion=NUEVO'?> method='POST' onSubmit="return check_form(formMantTest);" name="formMantTest">
  <input type='hidden' name = 'txtIdPersona' value = '<?php echo $_GET['IdPersona']?>'>
  <?php
require("../negocio/cls_tipocriterio.php");
$objTipoCriterio = new clsTipoCriterio();
require("../negocio/cls_membresia.php");
$objMembresia = new clsMembresia();
require("../negocio/cls_variablelinguistica.php");
$objVariableLinguistica = new clsVariableLinguistica();
$rstTC = $objTipoCriterio->buscar(NULL);
while($datoTC = $rstTC->fetchObject()){?>
<?php
$rst = $objMembresia->buscarxTipoCriterioTest($datoTC->idtipocriterio);
$cantMemxCrite=$rst->rowCount();
if($cantMemxCrite>0){?>
    <br>
    <fieldset><legend><b><?php echo $datoTC->descripcion;?>: </b></legend>
    <?php
    while($dato = $rst->fetchObject()){?>
    <fieldset><legend><?php echo utf8_encode($dato->descripcion);?>: </legend>
    <?php if($dato->tipocontrol=='O'){?>
        <?php $rstvariable = $objVariableLinguistica->buscarxMembresia($dato->idmembresia);?>
        <?php 
            $cont=0;
            while($datovariable = $rstvariable->fetchObject()){?>
        <label><input type="radio" id="opt<?php echo $datovariable->idvariable;?>" name="optg<?php echo $dato->idmembresia;?>" value="<?php echo $datovariable->idvariable;?>-<?php echo $datovariable->valormedio;?>" <?php if($cont==0) echo 'checked';?>><?php echo $datovariable->nombre;?></label><br>
        <?php 
            $cont+=1;
            }?>
    <?php }else{?>
            Ingrese <?php echo strtolower($dato->descripcion);?>:
            <input type="text" name="txt<?php echo $dato->idmembresia;?>" id="txt<?php echo $dato->idmembresia;?>" value="<?php if($dato->idmembresia==1) echo obtenerEdad($datoP->fechanacimiento);?>"><br>
            <?php echo ucfirst(strtolower($dato->comentario));?>
    <?php }?>
    </fieldset>
    <br>
    <?php }?>
    </fieldset>
<?php }?>
<!--<br>-->
<?php 
}
?> 
<br>
<center> <input type='submit' name = 'grabar' value='GRABAR'> <input type='button' name = 'cancelar' value='CANCELAR' onClick="javascript:window.open('list_personatest.php','_self')"></center>
</form>
	</td>
  </tr>
</table>
	</div>
</div>
</body>
</html>
<?php
require("../footer_new.php");
?>