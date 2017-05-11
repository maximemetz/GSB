<?php @session_start();

include "connectAD.php";

$idFicheFrais = $_GET['id'];

$sql1 = "DELETE FROM FicheFrais WHERE id=".$idFicheFrais;
$result1 = executeSQL($sql1);
$sql2 = "DELETE FROM LigneFraisForfait WHERE idFicheForfait=".$idFicheFrais;
$result2 = executeSQL($sql2);

if ($result1 && $result2)
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheFicheFrais.php?message=<font color=green> Suppression realisee </font>'>";
else
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheFicheFrais.php?message=<font color=red> Probleme de suppression... </font>'>";

?>