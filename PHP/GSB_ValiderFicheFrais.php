<?php @session_start();

include "connectAD.php";

$idVisiteur = $_GET['idVisiteur'];
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$annee = $_GET['annee'];
$mois = $_GET['mois'];

				    
$sqlidFicheFrais = 
        "SELECT id
		FROM FicheFrais
		WHERE idVisiteur ='$idVisiteur'
		AND mois = '$mois'
		AND annee = '$annee'";

$idFicheFrais = champSQL($sqlidFicheFrais);

$sqlquantiterepas = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='REP' ;";
$sqlquantitenuitee = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='NUI' ;";
$sqlquantiteetape = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='ETP' ;";
$sqlquantitekm = "SELECT quantite FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais' AND idForfait='KM' ;";

$quantiterepas = champSQL($sqlquantiterepas);
$quantitenuitee = champSQL($sqlquantitenuitee);
$quantiteetape = champSQL($sqlquantiteetape);
$quantitekm = champSQL($sqlquantitekm);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   

<title>Galaxy Swiss Bourdin</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Comptable.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
		</div>
	    <div id="titre">
			Validation fiche de frais
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
     
<form action="GSB_Valide.php" method="get">
	
    <fieldset>
        
        
        <label>Id </label>
		<input name="idVisiteur" id="idVisiteur" value="<?php echo $idVisiteur ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
        <label>Nom </label>
		<input name="nom" id="nom" value="<?php echo $nom ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
		<label>Pr&eacute;nom </label>
		<input name="prenom" id="prenom" value="<?php echo $prenom ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
		<label>Ann&eacute;e </label>
		<input name="annee" id="annee" value="<?php echo $annee ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
		<label>Mois </label>
		<input name="mois" id="mois" value="<?php echo $mois ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
		<label>idFicheFrais </label>
		<input name="idFicheFrais" id="idFicheFrais" value="<?php echo $idFicheFrais ?>" type="text" size="auto" readonly="readonly"/>
		
		
    </fieldset>

<br />
<br />
<br />

<div class="ecrit">  		
<?php
echo "Frais au forfait";
?>
</div>	

<br />
<br />
<br />
<br />

<center>

		<TABLE border=1>
			<TR>
				<TH>Repas midi</TH>
				<TH>Nuit&eacute;e</TH>
				<TH>&Eacute;tape</TH>
				<TH>Km</TH>
				<TH>Situation</TH>
			</TR>
			
			<TR>
				<td><?php echo $quantiterepas ?></td>
				<td><?php echo $quantitenuitee ?></td>
				<td><?php echo $quantiteetape ?></td>
				<td><?php echo $quantitekm ?></td>
				<td>
				    <input type="radio" name="validation" value="1"> Valide
                    <input type="radio" name="validation" value="0"> Non Valide
				</td>
			</tr>
		</table>
		
		<br />
		<br />
		
		<fieldset>
			
				
			<input id="button" class="button" type="submit" value="Valider"/>
		
		
		</fieldset>
		
	</form>
	
</center>

<br />
<br />
<br />
<br />
	
</body>

</html>