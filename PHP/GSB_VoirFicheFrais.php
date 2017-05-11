<?php @session_start();

include "connectAD.php";

$idFicheFrais = $_GET['id'];

$sqlFiche = "SELECT * FROM FicheFrais WHERE id=".$idFicheFrais;
$result = executeSQL($sqlFiche);

while($row = mysqli_fetch_array($result)) {
	$mois      = $row["mois"];
	$annee     = $row["annee"];
	$etat      = $row["idEtat"];
	$montant   = $row["montantValide"];
	$datemodif = $row["dateModif"];
}

$sqletat = "SELECT libelle FROM Etat WHERE id='$etat';";
$libelleetat = champSQL($sqletat);

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

<title>Suivi fiche de frais</title>

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
	
	<br />
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
	
	<br />
	<br />
	     
	<table border=1>
		
		<tr>
			<th>Repas midi</th>
			<th>Nuit&eacute;e</th>
			<th>&Eacute;tape</th>
			<th>Km</th>
			<th>Situtation</v>
			<th>Date op&eacute;ration</th>
			<th>Remboursement</th>
		</tr>
		
		<tr>
		    <td><?php echo $quantiterepas; ?></td>
		    <td><?php echo $quantitenuitee; ?></td>
		    <td><?php echo $quantiteetape; ?></td>
		    <td><?php echo $quantitekm; ?></td>
		    <td><?php echo $libelleetat; ?></td>
		    <?php 
		    if (!empty($datemodif)){
		    ?>
		        <td><?php echo $datemodif; ?></td>
		    <?php
		    } else {
		    ?>
		        <td><?php echo "Non modifi&eacute;e"; ?></td> 
	        <?php
		    }
		    ?>
		    <?php 
		    if ($etat = 'RB'){
		    ?>
		        <td><?php echo $montant; ?></td>
		    <?php
		    } else {
		    ?>
		        <td><?php echo "Non rembours&eacute;"; ?></td> 
	        <?php
		    }
		    ?>
		</tr>
		
	</table>
		
	<br />
	<br />
	<br />
		
</body>

</html>