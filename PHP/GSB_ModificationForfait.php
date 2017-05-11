<?php @session_start();

include "connectAD.php";

//on recupere toutes les valeurs 
$id = $_GET['id'];
$_SESSION['idForfait'] = $id;

$sql = "SELECT * FROM Forfait WHERE id='$id'";
$result = tableSQL($sql);

foreach ($result as $ligne) {

//on extrait chaque valeur de la ligne courante
$libelle = $ligne[1];
$montant = $ligne[2];

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

	<form action="GSB_UpdateForfait.php" method="get">
	
       <br /><br /><br /><br /><br /><br /><br />
       
		<fieldset>
		
			
			<legend align="center">Modification Forfait</legend>
			
			<label>Id : </label>
			<input name="id" id="id" value="<?php echo $id; ?>" type="text" size="auto" required="required" />
			
			<br /><br />
			
			
			<label>Libelle : </label>
			<input name="libelle" id="libelle" value="<?php echo $libelle; ?>" type="text" size="auto" required="required"/> 
	
			<br /><br />
			
			
			<label>Montant : </label>
			<input name="montant" id="montant" value="<?php echo $montant; ?>" type="number" min="0" size="auto" required="required"/>
			
			<br /><br />
			
			<input id="button" class="button" type="submit" value="Modifier"/>
		
		</fieldset> 
		
	</form>
	
<br /><br />	

<footer>
    <div id="deconnexion">
    	<br />
	    <a href="GSB_Deconnexion.php">D&eacute;connexion</a>
	</div>
</footer>
	
</body>

</html>