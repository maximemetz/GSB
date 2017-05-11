<?php @session_start();

include "connectAD.php";

$date = date('Y-m-d');

$sql = "UPDATE FicheFrais
        SET idEtat='RB', dateModif='$date'
        WHERE idEtat='VA';";
        
$result = executeSQL($sql);

//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($result)
	echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=green> Mise en paiement realise </font>'>";
	else
		echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=red> Erreur </font>'>";


?>