<?php @session_start();

include "connectAD.php";

// recuperation des nouvelles informations
$Nouvelid  = $_GET['id'];
$libelle   = $_GET['libelle'];
$montant   = $_GET['montant'];
$idForfait = $_SESSION['idForfait'];

$sqlupdate = "UPDATE Forfait SET libelle='$libelle', montant='$montant', id='$Nouvelid' WHERE id='$idForfait'";

unset($_SESSION['idForfait']);

$result = executeSQL($sqlupdate);

//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non
if ($result) {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=green> Modification realisee </font>'>";
} else {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=red> Probleme de modification... </font>'>";
}

?>
