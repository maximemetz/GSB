<?php @session_start(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Galaxy Swiss Bourdin</title>

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
   <br />
   <br />
	
	<form action="GSB_InsertForfait.php" method="get">
		
		<fieldset>
			
			<legend align="center">Nouveau Forfait</legend>
			
			<label>Id : </label>
			<input name="id" id="id" value="" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			<label>Libelle : </label>
			<input name="libelle" id="libelle" value="" type="text" size="auto" required="required"/> 
	
			<br /><br />
			
			<label>Montant : </label>
			<input name="montant" id="montant" value="" type="number" min="0" size="auto" required="required"/>
			
			<br /><br /><br />
			
			<input id="button" class="button" type="submit" value="Ajouter"/>
			
			<br /><br />
			
			<input id="button" class="button"  type="reset" value="R&eacute;initialiser"/>
		
		</fieldset> 
		
	</form>
	
</body>

</html>