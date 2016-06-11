<?php 
session_start();
if($_SESSION['IdTipo']==1){
	require("../header_new.php");
}else{
	require("../header_usu_new.php");
}
require("../fuzzy/logicadifusaESDF.php");
$objLogicaSeper = new FuzzySEPER();
?>
<h2 class="art-postheader">RESULTADOS</h2>
<div class="art-postcontent">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RESULTADOS</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br />
  <fieldset style="height:400px">
  <legend><strong>RESULTADOS:</strong></legend>
  <table border="1" align="center">
<tr>
<th class="cabezera">CODIGO</th>
<th class="cabezera">PERSONA</th>
<?php if($_SESSION['IdTipo']==1){?>
<th class="cabezera">GRADO DE DECISI&Oacute;N FUZZY</th>
<?php }?>
<th class="cabezera">GRADO DE ACEPTACI&Oacute;N FUZZY</th>
<th class="cabezera" colspan="3">OPERACIONES</th>
</tr>
<?php 
require("../datos/cado.php");
require_once("../negocio/cls_respuesta.php");
$objRespuesta= new clsRespuesta();
$rst = $objRespuesta->resultadofinal();
while($dato=$rst->fetchObject()){
	$objLogicaSeper = new FuzzySEPER();
	?>
    <tr>
    <td><?php echo $dato->codigo;?></td>
    <td><?php echo $dato->persona;?></td>
    <?php 
	$puntaje=$objLogicaSeper->obtenerPuntaje($dato->idpersona);
	if($_SESSION['IdTipo']==1){?>
    <td align="center"><?php echo $puntaje;?></td>
    <?php }?>
    <td><?php
	echo str_replace('_',' ',$objLogicaSeper->obtenerGradosPertenecia($puntaje));?></td>
    <td><a href="resultado_paciente.php?idpersona=<?php echo $dato->idpersona;?>">Imprimir&nbsp;resultado</a></td>
    <?php if($_SESSION['IdTipo']==1){?>
    <td><a href="../fuzzy/logicadifusaConsolaESDF.php?idpersona=<?php echo $dato->idpersona;?>" target="_blank">ver&nbsp;modo&nbsp;consola</a></td>
    <td><a href="../fuzzy/logicadifusaConsolaESDF_Bloques.php?idpersona=<?php echo $dato->idpersona;?>" target="_blank">ver&nbsp;modo&nbsp;consola bloque</a></td>
    <?php }?>
    </tr>
    <?php 
}
?>
</table>
</fieldset>
</body>
</html>
<?php
require("../footer_new.php");
?>