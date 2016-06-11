<?php
session_start();
require("header_new_login.php");
?> 
<h2 class="art-postheader"><!--Page 2--></h2>
<div class="art-postcontent">
<form id="Login" action='negocio/cont_usuario.php?accion=LOGEO' method='POST' name="Login">
      <table align="center" border="0" class="tablaOculta">
        <tr>
          <td colspan="2"> <div align="center" class="subtitulo" style="display:none"><em>Si eres mienbro ingresa al sitio, sino <a href="presentacion/buscarxdni.php">Registrate </a> </em></div></td>
        </tr>
        <tr>
          <td colspan="2" class="Estilo6 "><div align="center" class="subtitulo">
              <h3>ACCESO AL SISTEMA</h3><br>
          </div></td>
        </tr>
        <tr>
          <td class="etiquetalogeo"><div align="right">USUARIO : </div></td>
          <td ><label><input type="text" name="txtusuario" id="txtusuario" value=""/></label></td>
        </tr>
        <tr>
          <td class="etiquetalogeo"><div align="right">PASSWORD :</div></td>
		  <td><label><input type="password" name="txtclave" id="txtclave"/></label></td>
        </tr>
        <tr>
          <td height="44" colspan="2" align="center"><center><input type="submit" name="Submit" value="Ingresar"/></center></td>
        </tr>
	  </table>
	  </form>
<script>document.getElementById('txtusuario').focus();</script>
<?php
require("footer_new.php");
?>