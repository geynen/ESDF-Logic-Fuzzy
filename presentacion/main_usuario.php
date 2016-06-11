<?php
session_start();
if($_SESSION['IdTipo']!=2) header("location: ../Inicio.php");
require("../datos/cado.php");
require("../header_usu_new.php");
//$sql="select foto from postulante"
//$resultado=$cnx->query($sql);

?> 
<h2 class="art-postheader"><!--Page 2--></h2>
<div class="art-postcontent">
<table class="tablaOculta" border="0" align="center">
<tr>
    <th align="center">USUARIO</th>
</tr>
<tr>
   <td><img src="../foto/<?php echo $_SESSION['fot'];?>"  width="220" height="250"/>	  </td>
</tr>
<tr>
	<th align="center"><a href="mant_foto.php">Sube tu Foto</a></th>
</tr>
</table>
<?php
require("../footer_new.php");
?>