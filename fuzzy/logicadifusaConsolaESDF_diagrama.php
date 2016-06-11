<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->
<?php 
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
      Google Visualization API Sample
    </title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['orgchart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['Name',                                                                 'Manager', 'Tooltip'],
		  <?php 
		  while($datoMF=$rstMF->fetchObject()){			  
			  $rstregla=$objRegla->consultarMembresiaPadre($datoMF->descripcion);
			  while($dato=$rstregla->fetchObject()){
				  $dataArray .= "['".$dato->membresia_output."', null, '".$dato->membresia_output."'],";
				  $dataArray .= "['".$dato->membresia_input1."', '".$dato->membresia_output."', '".$dato->membresia_input1."'],";
				  $dataArray .= "['".$dato->membresia_input2."', '".$dato->membresia_output."', '".$dato->membresia_input2."'],";
			  }
		  }
		  echo substr($dataArray,0,-1);
		  ?>
        ]);
      
        // Create and draw the visualization.
        new google.visualization.OrgChart(document.getElementById('visualization')).
            draw(data, {allowHtml: true});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="visualization" style="width: 300px; height: 300px;"></div>
  </body>
</html>
​