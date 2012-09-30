<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload</title>
<link rel="stylesheet" type="text/css" href="base.css"/>

</head>
<body>
		<div class="box alerts">
		<h2>Accions realitzades amb èxit</h2>
<?
//GENERAL VARS//
$docs = "docs/"; //DOCUMENTS FOLDER
?>
<ul>
</ul>
<p>Informació detallada dels arxius penjats:</p>
<ul>

<?php
if (isset ($_POST["eliminar"])){
	$tot_eliminar = count($_POST["eliminar"]);
	for ($i = 0; $i < $tot_eliminar; $i++){
		$eliminar[$i]=$docs.$_POST["eliminar"][$i];
		if(unlink($eliminar[$i])){
			echo "<li class='positive'>S'ha eliminat correctament l'arxiu <i>".$eliminar[$i]."</i> ";
		}
		else{echo "<li class='negative'>Hi ha hagut algun problema i no s'ha pogut eliminar correctament l'arxiu <i>".$eliminar[$i]."</i> ";}
	}
}
if (isset ($_FILES["archivos"])) {
	$tot = count($_FILES["archivos"]["name"]);
	for ($i = 0; $i < $tot; $i++){
		$pdfs="";
        $tmp_name = $_FILES["archivos"]["tmp_name"][$i];
        $name = $_FILES["archivos"]["name"][$i];
		$destino = $docs.$name;
		if(file_exists($destino)){
			$rand =rand();
			$destino = $docs.$rand.$name;
		}
		if(is_uploaded_file($_FILES["archivos"]["tmp_name"][$i])){
			if(move_uploaded_file($_FILES["archivos"]["tmp_name"][$i],$destino)){
				echo "<li class='positive'>S'ha penjat correctament <i>".$name."</i> ";
			}
			else{
				echo "<li class='negative'>Hi ha hagut un problema en la pujada de <i>".$name."</i>, torna-ho a intentar.</li>";
			}
		}
		else{
			echo "<li class='negative'>No s'ha seleccionat cap fitxer per al <i>PDF número ".$i."</i></li>";
		}
	}
} 

?>
</ul>
<p>Els documents que actualment hi ha penjants son:</p>
<ul>
<?
//WE SHOW THE CURRENT DOCUMENTS//
	$filef= glob($docs.'*');
	for ($i = 0; $i < count($filef); $i++) {
			$expf = explode($docs,$filef[$i]);
			$titlef = $expf[count($expf)-1];
			echo '<li><a href="'.$filef[$i].'" target="_blank">'.$titlef.'</a></li>';
	}
	if(count($filef)==0){echo "<li class='negative'>No hi ha cap arxiu penjat a la web</li>";}
     
?>
</ul>
        <div class="parent"><a class="button color blue" href="index.php">Anar al formulari inicial</a></div>
		</div><!--end .box-->
	
	</div><!--end #content-->
	</div><!--end #container-->
</body>
</html>
