<?php @session_start();

	include "connectAD.php";

	$mois = date('n');
	$annee = date('Y');
	$id = $_SESSION["id"];


	$sql = "SELECT id
			FROM FicheFrais
			WHERE mois = $mois
			AND annee = $annee
			AND idVisiteur = '$id'";

	$existance = compteSQL($sql);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Page Visiteur</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Visiteur.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
		</div>
	    <div id="titre">
			<!-- TITRE -->
		</div>
		<div id="logo">
			<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
		</div>
	</div>

<br />
<br />
<br />
<br />

<div class="ecrit">
<?php
	//message de bienvenue pour confirmer la connexion sur le bon compte
	echo "Bienvenue ", $_SESSION["prenom"], " ", $_SESSION["nom"];
?>
</div>

       <br />
       <br />
       <br />

		<fieldset>

			<legend align="center">Module Gestion Fiche de frais</legend>

			<form action="GSB_AfficheFicheFrais.php" method="get">

			<input id="grandbouton" class="grandbouton" type="submit" value="Consulter les fiches de frais"/>

		    </form>

		    <br/>

		    <?php

		    if ($existance == 0) {

		    ?>

		    <form action="GSB_RenseignerFicheFrais.php" method="get">

		    <input id="grandbouton" class="grandbouton" type="submit" value="Renseigner les fiches de frais"/>

		    </form>

		    <?php

		    } else {

		    ?>

		    <form action="GSB_RenseignerFicheFrais.php" method="get">

		    <input id="inactif" class="grandbouton" type="submit" value="Renseigner les fiches de frais" disabled="disabled"/>

		    </form>

		    <?php

		    }

		    ?>

		</fieldset>

<br />
<br />
<br />

</body>

</html>