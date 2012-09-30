<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="base.css"/>
<script type="text/javascript" src="functions.js"></script>
<title>Pàgina de notícies</title>
</head>
<body>
    <form class="box" id="news" action="function.php" method="post" enctype="multipart/form-data">     
   <label>Arxius per pujar amb nom (petit comentari):</label>
   <div id="adjuntos">
   	<div class="archivo">
       <input type="file" name="archivos[]" />
   	</div>
   </div>
   <a href="#" onClick="addCampo()">Pujar un altre arxiu</a>

<h2>Arxius actualment penjats</h2><p>Per eliminar algun arxiu, marca la casella</p>
<?
//WE SHOW THE CURRENT DOCUMENTS//
	$docs = 'docs/';
	$filef= glob($docs.'*');
	for ($i = 0; $i < count($filef); $i++) {
			$expf = explode($docs,$filef[$i]);
			$titlef = $expf[count($expf)-1];
			echo '<li><a href="'.$filef[$i].'" target="_blank">'.$titlef.'</a><input name="eliminar[]" type="checkbox" value="'.end(explode($docs,$filef[$i])).'"</li>';
	}
	if(count($filef)==0){echo "<li class='negative'>No hi ha cap arxiu penjat a la web</li>";}
     
?>

    <button class="button color blue" type="submit" name="enviar">Enviar</button>
    </form>

</body>
</html>