<?php @session_start();

include "connectAD.php";

$id = $_GET['id'];

$sql="SELECT id FROM FicheFrais WHERE idVisiteur ='$id'";
$resultat = tableSQL($sql);

foreach ($resultat as $ligne) {
$idFicheFrais = $ligne[0];
$sql1 = "DELETE FROM LigneFraisForfait WHERE idFicheForfait='$idFicheFrais'";
$result1 = executeSQL($sql1);
$sql2 = "DELETE FROM FicheFrais WHERE id='$idFicheFrais'";
$result2 = executeSQL($sql2);
}

$sql3 = "DELETE FROM Visiteur WHERE id = $id";
$result3 = executeSQL($sql3);


if ($result3)
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheVisiteur.php?message=<font color=green> Suppression realisee </font>'>";
else
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheVisiteur.php?message=<font color=red> Probleme de suppression... </font>'>";

?>