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
			Accueil Comptable
		</div>
		<div id="logo">
			<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
		</div>
	</div>
     
<br /><br /><br /><br />
       
<div class="ecrit">  		
	<?php
		if (isset($_GET['message']))
				echo $_GET['message'];
	?>
</div>	       
       
<br />
<br />
       
<fieldset>

	<legend align="center">Module Administration</legend>
	
	<form action="GSB_AjoutVisiteur.php" method="get">

    	<input id="grandbouton" class="grandbouton" type="submit" value="Ajout visiteurs"/>

    </form>
    
    <br/>
    
    <form action="GSB_AfficheVisiteur.php" method="get">
	
		<input id="grandbouton" class="grandbouton" type="submit" value="Affichage des visiteurs"/>

    </form>
    
</fieldset> 

<br/>

<fieldset>

	<legend align="center">Module Suivi paiement</legend>
	
	<form action="GSB_ChoixVisiteur.php" method="get">
	
		<input id="grandbouton" class="grandbouton" type="submit" value="Valider les fiches de frais"/>

    </form>
    
    <br/>
    
    <form action="GSB_MiseEnPaiement.php" method="get">

    	<input id="grandbouton" class="grandbouton" type="submit" value="Mise en paiement des fiches de frais"/>

    </form>
    
</fieldset> 

<br />

<fieldset>
	
	<form action="GSB_Cloturer.php" method="get">
	
		<input id="grandbouton" class="grandbouton" type="submit" value="Cloturer les fiches de frais"/>

    </form>
    
    <br />
    
    <form action="GSB_AfficheForfait.php" method="get">
	
		<input id="grandbouton" class="grandbouton" type="submit" value="Ajustement des tarifs"/>

    </form>
    
</fieldset> 
		
		
<br />
<br />
<br />

</body>

</html>