<?php @session_start();

include "connectAD.php";

//on recupere toutes les valeurs 
$id      = $_GET['id'];
$libelle = $_GET['libelle'];
$montant = $_GET['montant'];

//requete SQL insert into pour nouveau forfait
$sqlinsert = "INSERT INTO
Forfait (id, libelle, montant)
VALUES
('$id', '$libelle', '$montant');";


//execution de la requete dans la base de donnees
$sql = executeSQL($sqlinsert);


//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non
if ($sql) {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=green> Ajout realise </font>'>";
} else {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=red> Erreur </font>'>";
}
?>