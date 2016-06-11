<?php
session_start();
if($_SESSION['IdTipo']!=2) header("location: ../Inicio.php");
require("../datos/cado.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es" xml:lang="es">
<head>
    <!--
    Created by Artisteer v3.1.0.45994
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>ESDF Logic Fuzzy</title>



    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="../css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="../css/style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="../css/jquery.js"></script>
    <script type="text/javascript" src="../css/script.js"></script>
    
</head>
<body>
<div id="art-page-background-middle-texture">
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-header">
        <div class="art-header-position">
            <div class="art-header-wrapper">
                <div class="cleared reset-box"></div>
                <div class="art-header-inner">
                <div class="art-headerobject"></div>
                <div class="art-logo">
                                 <h1 class="art-logo-name"><a href="./index.html">Sistema Experto de Diagnostico de Diabetes Militus II</a></h1>
                                                 <h2 class="art-logo-text">Lógica Difusa</h2>
                                </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="cleared reset-box"></div>
    <div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
<div class="art-bar art-nav">
<div class="art-nav-outer">
	<ul class="art-hmenu">
		<li>
			<a href="#">Bienvenido:<font color='white'> <?php echo $_SESSION['Nombre'];?></font></a>
		</li>	
		<li>
			<a href="#" class="active">Perfil: <font color='white'><?php echo utf8_encode($_SESSION['TipoUsuario']);?></font></a>
		</li>
        <li><a href='../salir.php'>SALIR</a></li>
	</ul>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1">
<div class="art-box art-vmenublock">
    <div class="art-box-body art-vmenublock-body">
                <div class="art-bar art-vmenublockheader">
                    <h3 class="t"><!--Menú Vertical--></h3>
                </div>
                <div class="art-box art-vmenublockcontent">
                    <div class="art-box-body art-vmenublockcontent-body">
                <ul class="art-vmenu">
	<li><a href="main_usuario.php">INICIO</a></li>
  	<li><a href="mant_persona_usu.php">MIS DATOS</a></li>
    <li><a href="list_persona.php">PACIENTES</a></li>
    <li><a href="list_personatest.php">APLICAR TEST</a></li>
   	<li><a href="resultadofinal.php">RESULTADOS</a></li>
	<li><a href='../salir.php'>SALIR</a></li>	
</ul>
                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>
                          <div class="cleared"></div>
                        </div>
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">