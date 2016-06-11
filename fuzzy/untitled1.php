<?php 
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Simple Graph Layout: Hedgepigs</title>
		<style>
			body { background: black; font: 13px/13px helvetica, sans-serif; }
			#canvas { display: block; margin: auto; width: 960px; height: 720px; border: #111 1px solid; }
		</style>
		<script type="text/javascript" src="../lib/jssvggraph/graph.js"></script>
	</head>
	<body>
		<svg xmlns="http://www.w3.org/2000/svg" id="canvas"></svg>
		<script type="text/javascript">
		<![CDATA[
			var g = new Graph("canvas", 960, 700 );
	<?php
	$xx = str_replace('addNode','createVertex',$_SESSION['DataGrafico']);
	$xx = str_replace('addEdge','createEdge',$xx);
	//echo $xx;
	?>
	g.createVertex("EDAD DEL PACIENTE");
            g.createVertex("HERENCIA FAMILIAR");
            g.createVertex("ENFERMEDAD POR HERENCIA");
            g.createEdge("ENFERMEDAD POR HERENCIA","EDAD DEL PACIENTE");
            g.createEdge("ENFERMEDAD POR HERENCIA","HERENCIA FAMILIAR");
	

			g.go();
		]]>
		</script>
	</body>
</html>