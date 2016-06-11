<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->
<?php 
session_start();
require("../datos/cado.php");
require("../negocio/cls_regla.php");
require("../negocio/cls_membresia.php");
$objRegla = new clsRegla();
$objMembresia = new clsMembresia();
$rstMF=$objMembresia->buscarxTipoCriterioTest(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Dracula
    </title>
<script type="text/javascript" src="../lib/dracula/strathausen-dracula-a6a5fa7/js/raphael-min.js"></script>
    <script type="text/javascript" src="../lib/dracula/strathausen-dracula-a6a5fa7/js/dracula_graffle.js"></script>
    <script type="text/javascript" src="../lib/dracula/strathausen-dracula-a6a5fa7/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="../lib/dracula/strathausen-dracula-a6a5fa7/js/dracula_graph.js"></script>
    <!--<script type="text/javascript" src="example.js"></script>-->
<script>

var redraw, g, renderer;

/* only do all this when document has finished loading (needed for RaphaelJS) */
window.onload = function() {
    
    var width = $(document).width() - 20;
    var height = $(document).height() - 60;
    
    g = new Graph();

    
    /* connect nodes with edges */

	<?php
	echo $_SESSION['DataGrafico'];
	?>
	

    /* layout the graph using the Spring layout implementation */
    var layouter = new Graph.Layout.Spring(g);
	
    /* draw the graph using the RaphaelJS draw implementation */
    renderer = new Graph.Renderer.Raphael('canvas', g, width, height);
    
    redraw = function() {
        layouter.layout();
        renderer.draw();
    };
    hide = function(id) {
        g.nodes[id].hide();
    };
    show = function(id) {
        g.nodes[id].show();
    };
    //    console.log(g.nodes["kiwi"]);
};


</script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="canvas"></div>
<button id="redraw" onClick="redraw();">redraw</button>
  </body>
</html>
​