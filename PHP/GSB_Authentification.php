<?php @session_start();

include "connectAD.php";

$Message_D_Erreur = $_GET["message"];
$desactivemotdepasse = TRUE;

//compte admin unique
$NOM_DE_COMPTE_ADMIN = "comptable";
$MOT_DE_PASSE_ADMIN  = "comptable";


if (!empty($_GET["nom_de_compte"]) && (!empty($_GET["nom_de_compte"]))){
	

	//on affecte les identifiants rentre par l'utilisateur
	$NomDeCompte = $_GET["nom_de_compte"];
	$MotDePasse = $_GET["mot_de_passe"];
	
	//connexion a la page admin
	if ($NomDeCompte == $NOM_DE_COMPTE_ADMIN && $MotDePasse == $MOT_DE_PASSE_ADMIN) {
		//on redirige vers la page GSB_Comptable
		header("Location: GSB_Comptable.php");
		exit();
	}
	
	
	$sqllogin ="SELECT login FROM Visiteur WHERE login = '$NomDeCompte';";
	$sqlpwd ="SELECT pwd FROM Visiteur WHERE login = '$NomDeCompte';";
	$sqlprenom ="SELECT prenom FROM Visiteur WHERE login = '$NomDeCompte';";
	$sqlnom ="SELECT nom FROM Visiteur WHERE login = '$NomDeCompte';";
	$sqlid = "SELECT id FROM Visiteur WHERE login = '$NomDeCompte';";
		
	//test nom de compte si les requetes trouve toutes un resultat
	if (compteSQL($sqllogin) && compteSQL($sqlpwd) && compteSQL($sqlprenom) && compteSQL($sqlnom) && compteSQL($sqlid)) {
		
		
		$NOM_DE_COMPTE = champSQL($sqllogin);
		$MOT_DE_PASSE = champSQL($sqlpwd);
		$_SESSION["prenom"] = champSQL($sqlprenom);
		$_SESSION["nom"] = champSQL($sqlnom);
		$_SESSION["id"] = champSQL($sqlid);
		
	}
	
	//si compte n'existe pas
	if($NOM_DE_COMPTE !== $_GET["nom_de_compte"])  {
		//message d'erreur si le nom de compte n'existe pas
		$Message_D_Erreur = "Ce nom de compte n'existe pas !";
		//permet d'afficher uniquement erreur nom de compte
		$desactivemotdepasse = FALSE;
	}
	
	//si bon compte mais mauvais mot de passe
	if($MOT_DE_PASSE !== $MotDePasse && $desactivemotdepasse)
		$Message_D_Erreur = "Mauvais mot de passe !";

	//si aucun nom de compte n'a ete entre
	if (empty($NomDeCompte))
		$Message_D_Erreur = "Veuillez entrez votre nom de compte !";

	//si aucun mot de passe n'a ete rentre
	if (empty($MotDePasse))
		$Message_D_Erreur = "Veuillez entrez votre mot de passe !";

	//test connexion a un compte visiteur
	if($NOM_DE_COMPTE == $NomDeCompte && $MOT_DE_PASSE== $MotDePasse) {
		//on redirige vers la page GSB_Visiteur
		header("Location: GSB_Visiteur.php");
		exit();
	}
	
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Galaxy Swiss Bourdin</title>
<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<div id="bandeau">
    <div id="titre">
		Bonjour
	</div>
	<div id="logo">
		<img src="../IMAGE/GSB_Logo.png"></img>
	</div>
</div>

<br /><br /><br /><br /><br /><br/><br />

	<form action="" method="get">
		
		<fieldset>
		
		<legend align="center">Formulaire d'authentification</legend>
	
<div id="erreur">	
<?php
//renvoie un message d'erreur si non vide
if(!empty($Message_D_Erreur))
	echo $Message_D_Erreur;
?>
</div>	
			<br />
		
			<label>Nom de compte :&nbsp;</label>
			<input name="nom_de_compte" id="nom_de_compte" value="" type="text" size="auto" />
			
			<br /><br/>
			
			<label>Mot de passe :&nbsp;</label>
			<input name="mot_de_passe" id="mot_de_passe" value="" type="password" size="auto"/>
			
			<br /><br />
		
			<input id="button" class="button" type="submit" value="Connexion"/>
		
		</fieldset> 
		
	</form>

</body>

</html>


