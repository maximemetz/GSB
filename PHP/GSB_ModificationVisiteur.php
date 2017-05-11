<?php @session_start();

include "connectAD.php";

$id = $_SESSION['id'];

// recuperation des nouvelles informations
$nom          = $_GET['nom'];
$prenom       = $_GET['prenom'];
$adresse      = $_GET['adresse'];
$cp           = $_GET['cp'];
$ville        = $_GET['ville'];
$dateEmbauche = $_GET['dateEmbauche'];
$login        = $_GET['nom_de_compte'];
$pwd          = $_GET['mot_de_passe'];


//composition et execution de la requete de modification
if ($dateEmbauche == NULL){
$sqlmodif = "UPDATE Visiteur SET id='$id', nom='$nom', prenom='$prenom', adresse='$adresse', cp='$cp', ville='$ville', login='$login', pwd='$pwd' WHERE id='$id'";
} else {
$sqlmodif = "UPDATE Visiteur SET id='$id', nom='$nom', prenom='$prenom', adresse='$adresse', cp='$cp', ville='$ville', dateEmbauche='$dateEmbauche', login='$login', pwd='$pwd' WHERE id='$id'";	
}

$result = executeSQL($sqlmodif);


//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($result)
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheVisiteur.php?message=<font color=green> Modification realisee </font>'>";
	else
		echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheVisiteur.php?message=<font color=red> Probleme de modification... </font>'>";

?>
