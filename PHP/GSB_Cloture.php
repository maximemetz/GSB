<?php @session_start();

include "connectAD.php";

$sql = "UPDATE FicheFrais
        SET idEtat='CL'
        WHERE idEtat='CR';";
        
$result = executeSQL($sql);

//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($result)
	echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=green> Cloture realise </font>'>";
	else
		echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=red> Erreur </font>'>";


?>