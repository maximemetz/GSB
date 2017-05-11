<?php @session_start();

include "connectAD.php";

$idFicheFrais = $_GET['id'];

$sqlFiche = "SELECT * FROM FicheFrais WHERE id=".$idFicheFrais;
$result = tableSQL($sqlFiche);

foreach ($result as $ligne) {
		//on extrait chaque valeur de la ligne courante
		$mois  = $ligne[2];
		$annee = $ligne[3];
		
}

$sqlquantiterepas  = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='REP' ;";
$sqlquantitenuitee = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='NUI' ;";
$sqlquantiteetape  = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='ETP' ;";
$sqlquantitekm     = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='KM' ;";

$quantiterepas  = champSQL($sqlquantiterepas);
$quantitenuitee = champSQL($sqlquantitenuitee);
$quantiteetape  = champSQL($sqlquantiteetape);
$quantitekm     = champSQL($sqlquantitekm);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Modification fiche de frais</title>

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
     
	<form action="GSB_ModifFicheFrais.php" method="get">
	
	   <br />
	   <br />
	   <br />
	   <br />
	   <br />
	   
		<fieldset>
			
			
			<label>Mois : </label>
			<input name="mois" id="mois" value="<?php echo $mois; ?>" type="text" size="auto" readonly="readonly" />
			
			<br /><br />
			
			
			<label>Ann&eacute;e : </label>
			<input name="annee" id="annee" value="<?php echo $annee; ?>" type="text" size="auto" readonly="readonly" /> 
	
			
		</fieldset>
		
		<br/><br/>
		
		<fieldset>
			
			
			<label>Repas midi : </label>
			<input name="repas" id="repas" value="<?php echo $quantiterepas; ?>" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			
			<label>Nuit&eacute;es : </label>
			<input name="nuitee" id="nuitee" value="<?php echo $quantitenuitee; ?>" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			
			<label>&Eacute;tape : </label>
			<input name="etape" id="etape" value="<?php echo $quantiteetape; ?>" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			
			<label>Km : </label>
			<input name="km" id="km" value="<?php echo $quantitekm; ?>" type="number" min="0" size="auto"/>
			
			<br />
			<br />
			<br />
			
			<input id="button" class="button" type="submit" value="Modifier"/>			
		
		
		</fieldset> 
		
	</form>
		
	<br />
	<br />
	<br />
	
</body>

</html>