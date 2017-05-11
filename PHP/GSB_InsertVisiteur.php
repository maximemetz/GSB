<?php @session_start();

include "connectAD.php";

//on recupere toutes les valeurs entrees dans le formulaire de creation de visiteur
$id           = $_GET['id'];
$nom          = $_GET['nom'];
$prenom       = $_GET['prenom'];
$adresse      = $_GET['adresse'];
$cp           = $_GET['cp'];
$ville        = $_GET['ville'];
$dateEmbauche = $_GET['dateEmbauche'];
$login        = $_GET['nom_de_compte'];
$pwd          = $_GET['mot_de_passe'];


//requete SQL insert into pour nouveau visiteur
if ($dateEmbauche == NULL) {
	$sqlinsert = "INSERT INTO 
	Visiteur (id, nom, prenom, adresse, cp, ville, login, pwd) 
	VALUES 
	('$id', '$nom', '$prenom', '$adresse', '$cp', '$ville', '$login', '$pwd');";
} else {
	$sqlinsert = "INSERT INTO 
	Visiteur (id, nom, prenom, adresse, cp, ville, dateEmbauche, login, pwd) 
	VALUES 
	('$id', '$nom', '$prenom', '$adresse', '$cp', '$ville', '$dateEmbauche', '$login', '$pwd');";
}

//execution de la requete dans la base de donnees
$sql = executeSQL($sqlinsert);


//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($sql)
	echo "<meta http-equiv='refresh' content='0;url=GSB_AjoutVisiteur.php?message=<font color=green> Ajout realise </font>'>";
	else
		echo "<meta http-equiv='refresh' content='0;url=GSB_AjoutVisiteur.php?message=<font color=red> Erreur </font>'>";


?>