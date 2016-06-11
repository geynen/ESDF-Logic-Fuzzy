<?php
session_start();
$_GET['accion']='ACTUALIZAR';
//if($_SESSION['IdTipo']!=1) header("location: ../Inicio.php");
require("../datos/cado.php");

if($_SESSION['IdTipo']==1){
	require("../header_new.php");
}else{
	require("../header_usu_new.php");
}
?>
<h2 class="art-postheader">RESULTADO: Examen Diabetes Militus II</h2>
<div class="art-postcontent">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script>
function imprimir(que) {
var ventana = window.open("", '', '');
var contenido = "<html><body onload='window.print();<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'Chrome')){?><?php }else{?>window.close();<?php }//echo $_SERVER['HTTP_USER_AGENT'];?>'><div style='font-family:calibri;font-weight: bold;'><center><h2>RESULTADO: Examen Diabetes Militus II</h2><center>";
contenido = contenido + document.getElementById(que).innerHTML + "</div><div align='left'><font size='-4'>Fuente: Sistema Experto de Diagnostico de Diabetes Militus II</font></div></body></html>";
ventana.document.open();
ventana.document.write(contenido);
ventana.document.close();
}
function imprimirtest(que,persona) {
var ventana = window.open("", '', '');
var contenido = "<html><body onload='window.print();<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'Chrome')){?><?php }else{?>window.close();<?php }//echo $_SERVER['HTTP_USER_AGENT'];?>'><div style='font-family:calibri;font-weight: bold;'><center><h2>RESULTADO: Examen Diabetes Militus II</h2><center><br>PACIENTE: "+persona;
contenido = contenido + document.getElementById(que).innerHTML + "</div><div align='left'><font size='-4'>Fuente: Sistema Experto de Diagnostico de Diabetes Militus II</font></div></body></html>";
ventana.document.open();
ventana.document.write(contenido);
ventana.document.close();
}
function imprimirtodo(que,que2) {
var ventana = window.open("", '', '');
var contenido = "<html><body onload='window.print();<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'Chrome')){?><?php }else{?>window.close();<?php }//echo $_SERVER['HTTP_USER_AGENT'];?>'><div style='font-family:calibri;font-weight: bold;'><center><h2>RESULTADO: Examen Diabetes Militus II</h2><center>";
contenido = contenido + document.getElementById(que).innerHTML + "<br>" + document.getElementById(que2).innerHTML + "</div><div align='left'><font size='-4'>Fuente: Sistema Experto de Diagnostico de Diabetes Militus II</font></div></body></html>";
ventana.document.open();
ventana.document.write(contenido);
ventana.document.close();
}
</script>
<div id="centralPanel">
<div class="centrarText">
<?php
//require("../datos/cado.php");
if($_GET['accion']=='ACTUALIZAR'){
require("../negocio/cls_persona.php");
	
$objPersona = new clsPersona();
$rst = $objPersona->buscar($_GET['idpersona'],'');
$dato = $rst->fetchObject();
$nombrecompleto=$dato->nombres.' '.$dato->apellidopaterno.' '.$dato->apellidomaterno;
}
?>
<div id="imprimir">
<fieldset> 
<legend><strong> DATOS PERSONALES</strong></legend>
<table width="732" align="center" class="tablaint">
<tr>
  <td align="right"> CODIGO :</td>
  <td colspan="3" align="left"><?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->codigo;?></td>
  </tr>
<tr>
	<td width="164" align="right"> NOMBRES :</td>
	<td colspan="3" align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->nombres;?></td>
	</tr>
<tr>
	<td align="right">APELLIDO PATERNO :</td>
	<td width="186" align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->apellidopaterno;?></td>
	<td width="172" align="right"> APELLIDO MATERNO :</td>
	<td width="190" align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->apellidomaterno;?></td>
</tr>
<tr>
	<td align="right"> N&ordm; DOCUMENTO : </td>
	<td align="left"><?php
	if($_GET['accion']=='ACTUALIZAR') {
	echo $dato->nrodoc;} else { echo '11111111111';}?></td>
	<td align="right"><div id="DivSexo1">SEXO : </div></td>
	<td align="left"><div id="DivSexo2">
	<?php
		if($_GET['accion']=="ACTUALIZAR" & $dato->Sexo=="F"){
			echo "Femenino";
        }
		else{
	        echo "Masculino";  
		  }
	?>
	 </div></td>
</tr>
<tr>
	<td align="right"> FECHA NACIMIENTO :</td>
	<td align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->fechanacimiento;?></td>
	<td align="right"> LUGAR NACIMIENTO :</td>
	<td align="left"><?php
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->lugarnacimiento;?></td>
</tr>
<tr>
	<td align="right"> DIRECCI&Oacute;N : </td>
	<td colspan="3" align="left"><?php if($_GET['accion']=='ACTUALIZAR')
	echo $dato->direccion;?></td>
	</tr>
<tr>
	<td align="right">ESTADO CIVIL : </td>
	<td colspan="3" align="left"><?php if($_GET['accion']=='ACTUALIZAR'){ if($dato->estadocivil=='S') echo 'Soltero';}?>
    <?php if($_GET['accion']=='ACTUALIZAR'){ if($dato->estadocivil=='C') echo 'Casado';}?>
    <?php if($_GET['accion']=='ACTUALIZAR'){ if($dato->estadocivil=='D') echo 'Divorciado';}?>
    <?php if($_GET['accion']=='ACTUALIZAR'){ if($dato->estadocivil=='V') echo 'Viudo';}?></td>
	</tr>
<tr>
	<td align="right"> TEL&Eacute;FONO FIJO : </td>
	<td align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->telefonofijo;?></td>
	<td align="right"> TEL&Eacute;FONO MOVIL : </td>
	<td align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->celular;?></td>
</tr>
<tr>
	<td align="right"> EMAIL : </td>
	<td colspan="3" align="left"><?php 
	if($_GET['accion']=='ACTUALIZAR')
	echo $dato->email;?></td>
	</tr>
</table>
</fieldset>
<br />
<?php 
require("../fuzzy/logicadifusaESDF.php");
$objLogicaSeper = new FuzzySEPER();
$puntaje = $objLogicaSeper->obtenerPuntaje($_GET['idpersona']);
$grado_pertenecia = str_replace('_',' ',$objLogicaSeper->obtenerGradosPertenecia($puntaje));
?>
<fieldset>
<legend><strong>RESULTADO</strong></legend>
<center><h1><?php echo $grado_pertenecia;?></h1></center><br />
</fieldset>
</div>
<div>
<br />
<center><button type="button" onclick="imprimir('imprimir')">IMPRIMIR</button></center>
<div align="right"><a href="resultadofinal.php">ver todos los resultados</a></div>
</div>
<br>
<div id="test">
<fieldset style="text-align:left"><legend><strong>TEST DE DIAGNOSTICO</strong></legend>
<?php 
//require("../negocio/cls_tipocriterio.php");
$objTipoCriterio = new clsTipoCriterio();
//require("../negocio/cls_membresia.php");
$objMembresia = new clsMembresia();
//require("../negocio/cls_variablelinguistica.php");
$objRespuesta= new clsRespuesta();
$tienerespuestas=false;
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
    <?php
	$rstR = $objRespuesta->buscar(NULL,$_GET['idpersona'],$dato->idmembresia);
	if($tienerespuestas==false){
		if($rstR->rowCount()>0) $tienerespuestas=true;
	}
	$datoR=$rstR->fetchObject();
	$Ridvariable=$datoR->idvariable;
	$Rvalor=$datoR->valor;
	?>
    <?php if($dato->tipocontrol=='O'){?>
        <?php $rstvariable = $objVariableLinguistica->buscarxMembresia($dato->idmembresia);?>
        <?php 
            $cont=0;
            while($datovariable = $rstvariable->fetchObject()){?>
        <label><input type="radio" id="opt<?php echo $datovariable->idvariable;?>" name="optg<?php echo $dato->idmembresia;?>" value="<?php echo $datovariable->idvariable;?>-<?php echo $datovariable->valormedio;?>" <?php if($cont==0) echo 'checked';?> <?php if($Ridvariable==$datovariable->idvariable) echo "checked";?> disabled="disabled"><?php echo $datovariable->nombre;?></label><br>
        <?php 
            $cont+=1;
            }?>
    <?php }else{?>
            Ingrese <?php echo strtolower($dato->descripcion);?>:
            <input type="text" name="txt<?php echo $dato->idmembresia;?>" id="txt<?php echo $dato->idmembresia;?>" value="<?php echo $Rvalor;?>" disabled="disabled"><br>
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
</fieldset>
</div>
<div>
<br />
<center><button type="button" onclick="imprimirtest('test','<?php echo $nombrecompleto;?>')">IMPRIMIR TEST</button> <button type="button" onclick="imprimirtodo('imprimir','test')">IMPRIMIR TODO</button></center>
<a href="#art-main">Subir</a>
</div>

</div>
</div>
<?php
require("../footer_new.php");
?>