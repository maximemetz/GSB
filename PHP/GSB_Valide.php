<?php @session_start();

include "connectAD.php";

$idFicheFrais = $_GET['idFicheFrais'];
$validation   = $_GET['validation'];

if ($validation == 1) {
$sql = "UPDATE FicheFrais
        SET idEtat='VA'
        WHERE id='$idFicheFrais';";
        $result = executeSQL($sql);
} else {
    header("location: GSB_Comptable.php");
}
        


//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($result)
	echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=green> Validation realise </font>'>";
	else
		echo "<meta http-equiv='refresh' content='0;url=GSB_Comptable.php?message=<font color=red> Erreur </font>'>";


?>