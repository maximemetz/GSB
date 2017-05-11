<?php @session_start(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Ajout Fiche Visiteur</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Comptable.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
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

	<form action="GSB_InsertVisiteur.php" method="get">
       
		<fieldset>
		
			<legend align="center">Nouvelle Fiche Visiteur</legend>
			
			<label>Identifiant : </label>
			<input name="id" id="id" value="" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			
			<label>Nom : </label>
			<input name="nom" id="nom" value="" type="text" size="auto" required="required"/> 
			
			<br /><br />
			
			
			<label>Pr&eacute;nom : </label>
			<input name="prenom" id="prenom" value="" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			
			<label>Adresse : </label>
			<input name="adresse" id="adresse" value="" type="text" size="auto"/>
			
			<br /><br />
			
			
			<label>Code Postal : </label>
			<input name="cp" id="cp" value="" type="text" size="auto"/>
			
			<br /><br />
			
			<label>Ville : </label>
			<input name="ville" id="ville" value="" type="text" size="auto"/>
			
			<br /><br />
			
			
			<label>Date embauche : </label>
			<input name="dateEmbauche" id="dateEmbauche" value="" type="date" placeholder="ex : AAAA-MM-JJ" size="auto" max="2017-02-04"/>
			<br /><br />
			
			
			<label>Nom de compte : </label>
			<input name="nom_de_compte" id="nom_de_compte" value="" type="text" size="auto" required="required"/>

			<br /><br />
			
			
			<label>Mot de passe : </label>
			<input name="mot_de_passe" id="mot_de_passe" value="" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			<div id="erreur">
			<?php
			//test du contenu du message et affichage de celui ci
			//contenu du message en fonction des valeurs rentrees et des erreurs produites
			if (isset($_GET['message']))
				echo $_GET['message'];
			?>
			</div>
			
			<br />
			
			<input id="button" class="button" type="submit" value="Ajouter"/>
			
			<br /><br />
			
			<input id="button" class="button"  type="reset" value="R&eacute;initialiser"/>
		
		</fieldset> 
		
	</form>
	
	<br />
	<br />
	<br />
       
</body>

</html>