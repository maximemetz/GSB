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
				
	<form action="GSB_Paiement.php" method="get">
	
		<input id="grandbouton" class="grandbouton" type="submit" value="Mettre en paiement"/>
	
	</form>
			
	<br />
	<br />
	<br />
	
</body>

</html>