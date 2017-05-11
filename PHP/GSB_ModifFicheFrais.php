<?php @session_start();

include "connectAD.php";

// recuperation des nouvelles informations
$id     = $_SESSION['id'];
$mois   = $_GET['mois'];
$annee  = $_GET['annee'];
$repas  = $_GET['repas'];
$nuitee = $_GET['nuitee'];
$etape  = $_GET['etape'];
$km     = $_GET['km'];


$sqlprixrepas ="SELECT montant FROM Forfait WHERE id = 'REP' ;";
$sqlprixnuitee ="SELECT montant FROM Forfait WHERE id = 'NUI';";
$sqlprixetape ="SELECT montant FROM Forfait WHERE id = 'ETP';";
$sqlprixkm ="SELECT montant FROM Forfait WHERE id = 'KM';";

$prixrepas = champSQL($sqlprixrepas);
$prixnuitee = champSQL($sqlprixnuitee);
$prixetape = champSQL($sqlprixetape);
$prixkm = champSQL($sqlprixkm);

$idVisiteur = $_SESSION["id"];

$montant = ($repas * $prixrepas) + ($nuitee * $prixnuitee) + ($etape * $prixetape) + ($km * $prixkm);

$sqlinsert = "INSERT INTO 
FicheFrais (idVisiteur, mois, annee, montantValide) 
VALUES 
('$idVisiteur', '$mois', '$annee', '$montant');";

$sqlupdate = "  UPDATE FicheFrais
				SET montantValide = '$montant'
				WHERE mois = '$mois'
				AND annee = '$annee'
				AND idVisiteur = '$idVisiteur';";

$sql = executeSQL($sqlupdate);

$sqlidfichefrais ="SELECT id FROM FicheFrais WHERE mois='$mois' AND annee='$annee' AND idVisiteur='$idVisiteur';";
$idFicheFrais = champSQL($sqlidfichefrais);

$sqlupdaterepas = " UPDATE LigneFraisForfait
					SET quantite = '$repas'
					WHERE idFicheForfait = '$idFicheFrais'
					AND idForfait = 'REP';";

$sqlupdatenuitee =" UPDATE LigneFraisForfait
					SET quantite = '$nuitee'
					WHERE idFicheForfait = '$idFicheFrais'
					AND idForfait = 'NUI';";

$sqlupdateetape = " UPDATE LigneFraisForfait
					SET quantite = '$etape'
					WHERE idFicheForfait = '$idFicheFrais'
					AND idForfait = 'ETP';";

$sqlupdatekm = " UPDATE LigneFraisForfait
					SET quantite = '$km'
					WHERE idFicheForfait = '$idFicheFrais'
					AND idForfait = 'KM';";

$sqlrepas = executeSQL($sqlupdaterepas);
$sqlnuitee = executeSQL($sqlupdatenuitee);
$sqletape = executeSQL($sqlupdateetape);
$sqlkm = executeSQL($sqlupdatekm);


//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($sql && $sqlrepas && $sqlnuitee && $sqletape && $sqlkm)
	echo "<meta http-equiv='refresh'content='0;url=GSB_AfficheFicheFrais.php?message=<font color=green> Modification realisee </font>'>";
else
	echo "<meta http-equiv='refresh'content='0;url=GSB_AfficheFicheFrais.php?message=<font color=red> Probleme de modification... </font>'>";


?>
