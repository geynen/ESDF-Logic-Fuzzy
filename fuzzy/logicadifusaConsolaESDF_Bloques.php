<?php 
session_start();
/***************************************************************
*  
*      (c) 2011 Ing. Geynen Rossler Montenegro Cochas (geynen_0710@hotmail.com)
*      All rights reserved
*
*	   BSD Licence
*
***************************************************************/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ESDF Logic Fuzzy Console</title>
<script type="text/javascript" src="../Highcharts-2.1.9/jquery-1.7.1.js"></script>
</head>
<body bgcolor="#FFFFFF" style="color:inherit">
<style>
.tabla div{
	border: solid 1px;
}
</style>
<?php
require("../datos/cado.php");
require_once ('fuzzy-logic-class.php');
require("../negocio/cls_tipocriterio.php");
require("../negocio/cls_membresia.php");
require("../negocio/cls_variablelinguistica.php");
require("../negocio/cls_regla.php");
require("../negocio/cls_respuesta.php");

$objMembresia = new clsMembresia();
$rstMStyle=$objMembresia->buscar(0);
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
print "<style>";
while($datoMStyle=$rstMStyle->fetchObject()){
	//$color = sprintf("#%06x",rand(0,16777215)); //colores muy oscuros
	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	print '#'.str_replace(' ','_',$datoMStyle->descripcion).'{';
	print 'background-color: '.$color;
	print '}';	
}
print "</style>";

//class FuzzySEPER{
	
	//function obtenerPersonaMejorPerfil($idpersona){
		
	if(isset($_GET['idpersona'])){	
		$idpersona=$_GET['idpersona'];
	}else{
		$idpersona=1;
	}
	$idmembresia=34;
	
	//echo 'PERSONA:'.$idpersona;
	echo "<center><h1>ESDF Logic Fuzzy: Modo Consola</h1></center>";
		$x = new Fuzzy_Logic();
		$x->clearMembers(); 


		$objTipoCriterio = new clsTipoCriterio();
		$objMembresia = new clsMembresia();
		$objVariable = new clsVariableLinguistica();
		
		$rstMF=$objMembresia->buscar($idmembresia);
		$datoMF=$rstMF->fetchObject();
		$membresiafinal=str_replace(' ','_',$datoMF->descripcion);
		
		//AGREGO MEMBRESIAS DE ENTRADA		
		$rstTC = $objTipoCriterio->buscar(NULL);
		$membresias='';
		$variables='';
		$indice=0;
		while($datoTC = $rstTC->fetchObject()){
			$rst = $objMembresia->buscarxcriteriodesdeFuzzy($datoTC->idtipocriterio);
			while($dato = $rst->fetchObject()){
				if($dato->tipo=='I'){
				$rstvariable = $objVariable->buscarxMembresia($dato->idmembresia);
				if($rstvariable->rowCount()>0){
					$membresias.="'".str_replace(' ','_',$dato->descripcion)."',";
					while($datovariable = $rstvariable->fetchObject()){
						$variables.="\$x->addMember(\$x->getInputName($indice),'".str_replace(' ','_',$datovariable->nombre)."',  $datovariable->valorinicial, $datovariable->valormedio, $datovariable->valorfinal ,$datovariable->tipomembresia);";
					}
					$indice++;
				}
				}
			}
		}
		//echo '<BR><BR><HR><fieldset><legend>ENTRADAS</legend>';
		//echo '<BR><HR>MEMBRESIAS<br><BR>';
		//echo str_replace(',',',<br>',utf8_encode($membresias)).'<br>';
		//echo '<BR><HR>VARIABLES LINGUISTICAS<br><BR>';
		//echo str_replace(';',';<br>',utf8_encode($variables)).'</fieldset><br>';
		
		$membresias=substr($membresias,0,strlen($membresias)-1);
		eval("\$x->SetInputNames(array(".$membresias."));");	
		eval($variables);
		$membresias='';
		$variables='';
		$indice=0;
		//while($datoTC = $rstTC->fetchObject()){
			$rst2 = $objMembresia->buscarxcriteriodesdeFuzzy(NULL);
			while($dato = $rst2->fetchObject()){
				if($dato->tipo=='O'){
					$rstvariable = $objVariable->buscarxMembresia($dato->idmembresia);
					if($rstvariable->rowCount()>0){
						$membresias.="'".str_replace(' ','_',$dato->descripcion)."',";
						while($datovariable = $rstvariable->fetchObject()){
							$variables.="\$x->addMember(\$x->getOutputName($indice),'".str_replace(' ','_',$datovariable->nombre)."',  $datovariable->valorinicial, $datovariable->valormedio, $datovariable->valorfinal ,$datovariable->tipomembresia);";
						}
						$indice++;
					}
				}
			}
		//}

		//echo '<br><BR><HR><fieldset><legend>SALIDAS</legend>';
		//echo '<BR><HR>MEMBRESIAS<br><BR>';
		//echo str_replace(',',',<br>',utf8_encode($membresias)).'<br>';
		eval("\$x->SetOutputNames(array(".$membresias."));");	
		//echo '<BR><HR>VARIABLES LINGUISTICAS<br><BR>';
		//echo str_replace(';',';<br>',utf8_encode($variables)).'</fieldset><br>';
		
		$membresias=substr($membresias,0,strlen($membresias)-1);
		eval("\$x->SetOutputNames(array(".$membresias."));");	
		eval($variables);
		
		//echo '<br><BR><HR><fieldset><legend>REGLAS</legend>';
		$objRegla = new clsRegla();
		$rstregla=$objRegla->consultar();
		$x->clearRules();
		while ($datoregla=$rstregla->fetchObject()){
			//echo utf8_encode('$x->addRule(\'IF '.str_replace(' ','_',$datoregla->membresia_input1).'.'.str_replace(' ','_',$datoregla->variable_input1).' '.$datoregla->operadorlogico.' '.str_replace(' ','_',$datoregla->membresia_input2).'.'.str_replace(' ','_',$datoregla->variable_input2).' THEN '.str_replace(' ','_',$datoregla->membresia_output).'.'.str_replace(' ','_',$datoregla->variable_output).'\');<br>');
			$x->addRule('IF '.str_replace(' ','_',$datoregla->membresia_input1).'.'.str_replace(' ','_',$datoregla->variable_input1).' '.$datoregla->operadorlogico.' '.str_replace(' ','_',$datoregla->membresia_input2).'.'.str_replace(' ','_',$datoregla->variable_input2).' THEN '.str_replace(' ','_',$datoregla->membresia_output).'.'.str_replace(' ','_',$datoregla->variable_output));
		}
		//echo '</fieldset>';
		
		/*$rstMembresiaGrafico=$objMembresia->consultar();
		while($datoMembreciaGrafico=$rstMembresiaGrafico->fetchObject()){
		$dataGrafico.= "g.addNode('".$datoMembreciaGrafico->descripcion."');";
		}*/
		$bloqueHeader='<table border="1" class="tabla"><tr><td>DATOS DE ENTRADA</td>';
		$bloque='<tr><td>';
		
		//INTERACCION 1
		$objRespuesta = new clsRespuesta();
		$rstrpta=$objRespuesta->buscarxPersona($idpersona);
		//echo '<br><br><HR>INSERTO DATOS REALES (TEST)<br>';
		while ($datorpta=$rstrpta->fetchObject()){
			$xx.= "\$x->SetRealInput('".str_replace(' ','_',$datorpta->membresia)."',$datorpta->valor);";
			$x->SetRealInput(str_replace(' ','_',$datorpta->membresia),$datorpta->valor);
			$bloque.= "<div id='".str_replace(' ','_',$datorpta->membresia)."'>".utf8_encode($datorpta->membresia)."<br>".$datorpta->valor."</div>";
		}
		$bloque.='</td><td>';
		$bloqueHeader.='<td>INTERACCION 2</td>';
		
		//echo utf8_encode($xx);
		
		$fuzzy_arr = $x->calcFuzzy();
		//echo '<BR><br><HR>RESULTADO INTERACCION 1<br>';
		//print_r($fuzzy_arr);
		foreach($fuzzy_arr as $membresia => $v){
			if($v!=0){
			//echo utf8_encode($membresia).': ';
			//echo $v.'<br>';
				$rstregla=$objRegla->consultarMembresiasHija(str_replace('_',' ',$membresia));
				  while($dato=$rstregla->fetchObject()){
					  $bloque.= "<div id='".$membresia."' onMouseOver='buscarGrafico(&quot;".$dato->idmembresia_output."&quot;,&quot;".$v."&quot;)'>".utf8_encode(str_replace('_',' ',$membresia))." (".$v.")<br><font size='-3'>MEMBRESIA 1: <span id='".str_replace(' ','_',$dato->membresia_input1)."'>".utf8_encode($dato->membresia_input1)."</span><BR>MEMBRESIA 2: <span id='".str_replace(' ','_',$dato->membresia_input2)."'>".utf8_encode($dato->membresia_input2)."</span></font></div>";
				}
			$membresiaTEMP[]=$membresia;
			}
		}
				
		$membresia='';
		$valormembresiafinal=0;
		$i=2;
		do{
			$bloque.='</td><td>';
			$bloqueHeader.='<td>INTERACCION '.$i.'</td>';
			//echo '<BR><br><HR>RESULTADO INTERACCION '.$i.'<br>';
			foreach($fuzzy_arr as $membresia => $v){
				if($v!=0){
					$x->SetRealInput($membresia,$v);					
				}
			}

			$fuzzy_arr = $x->calcFuzzy();
			foreach($fuzzy_arr as $membresia => $v){
				if($v!=0){
					$encontrado=false;
					foreach($membresiaTEMP as $indiceTEMP => $valorTEMP){
						if($membresia==$valorTEMP){
							$encontrado=true;	
							continue;	
						}						
					}
					if($encontrado==false){
						//echo utf8_encode($membresia).': ';
						//echo $v.'<br>';
						if($membresia==$membresiafinal) $valormembresiafinal=$v;
						$rstregla=$objRegla->consultarMembresiasHija(str_replace('_',' ',$membresia));
						while($dato=$rstregla->fetchObject()){
						   $bloque.= "<div id='".$membresia."' onMouseOver='buscarGrafico(&quot;".$dato->idmembresia_output."&quot;,&quot;".$v."&quot;)'>".utf8_encode(str_replace('_',' ',$membresia))." (".$v.")<br><font size='-3'>MEMBRESIA 1: <span id='".str_replace(' ','_',$dato->membresia_input1)."'>".utf8_encode($dato->membresia_input1)."</span><BR>MEMBRESIA 2: <span id='".str_replace(' ','_',$dato->membresia_input2)."'>".utf8_encode($dato->membresia_input2)."</span></font></div>";	 	  
						}
						$membresiaTEMP[]=$membresia;
					}
				}
			}
			//la condicion indica el numero maximo de interacciones permitidas antes de mostrar el resultado
			if($i==5) $valormembresiafinal=1;
			$i++;
		}while($valormembresiafinal==0);
		
		//echo '<BR><br>RESULTADO<br>';
		echo '<br><HR>RESULTADO FINAL:<br>';
		$puntaje = $fuzzy_arr[$membresiafinal];
		echo utf8_encode($membresiafinal).': '.$puntaje;
		
		$grados = $x->getGradosPertenencia($membresiafinal,$puntaje);
		echo "<br>GRADOS DE PERTENECIA: ";
		foreach($grados as $i => $v){
			if($v!=0){
				$p=$v*100; $pertenencia .= $p.'%&nbsp;'.$x->getNameMember($membresiafinal, $i).'<br>';
			}
		}
		echo utf8_encode($pertenencia);
		
		//require("../presentacion/graficodifuso.php");

		$bloqueHeader.='</tr>';
		$bloque.='</td></tr>';
		$bloque=$bloqueHeader.$bloque.'</table>';
		echo $bloque;
?>
<script>
function buscarGrafico(idmembresia,puntaje){
$("#GraficoPopup").load("../presentacion/graficodifuso_popup.php?idmembresia="+idmembresia+"&puntaje="+puntaje);
}
</script>
<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'IE')){?>
<div id="GraficoPopup" style="position:absolute; right:0px; bottom:0px; top:90%"></div>
<?php }else{?>
<div id="GraficoPopup" style="position:fixed; right:0px; bottom:0px;"></div>
<?php }?>
</body>
</html>