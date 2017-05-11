<?php @session_start(); 

$mois = date('m');
$annee = date('Y');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Ajout fiche frais</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Visiteur.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
		</div>
	    <div id="titre">
			<!-- TITRE -->
		</div>
		<div id="logo">
			<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
		</div>
	</div>
     
	<form action="GSB_InsertFicheFrais.php" method="get">
	
       <br />
       <br />
       <br />
       <br />
       <br />
       
		<fieldset>
		
			
			<label>Mois : </label>
			<input name="mois" id="mois" value="<?php echo $mois; ?>" type="text" size="auto" readonly="readonly" />
			
			<br />
			<br />
			
			<label>Ann&eacute;e : </label>
			<input name="annee" id="annee" value="<?php echo $annee; ?>" type="text" size="auto" readonly="readonly" /> 

			
		</fieldset>
		
		<br/><br/>
		
		<fieldset>
			
			
			<label>Repas midi : </label>
			<input name="repas" id="repas" value="" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			<label>Nuit&eacute;e(s) : </label>
			<input name="nuitee" id="nuitee" value="" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			<label>&Eacute;tape : </label>
			<input name="etape" id="etape" value="" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			<label>Km : </label>
			<input name="km" id="km" value="" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			<br />
			
			<input id="button" class="button" type="submit" value="Ajouter"/>			
		
		
		</fieldset> 
		
	</form>
		
	<br />
	<br />
	<br />
	
</body>

</html>