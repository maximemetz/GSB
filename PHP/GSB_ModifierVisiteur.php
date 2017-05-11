<?php @session_start();

include "connectAD.php";

$id = $_GET['id'];
$_SESSION['id'] = $id;

$sql = "SELECT * FROM Visiteur WHERE id=".$id;
$result = executeSQL($sql);

while($row = mysqli_fetch_array($result)) {
$nom          = $row["nom"];
$prenom       = $row["prenom"];
$adresse      = $row["adresse"];
$cp           = $row["cp"];
$ville        = $row["ville"];
$dateEmbauche = $row["dateEmbauche"];
$login        = $row["login"];
$pwd          = $row["pwd"];
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Modification Visiteur</title>

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
	<br />
     
	<form action="GSB_ModificationVisiteur.php" method="get">
       
		<fieldset>
		
			
			<legend align="center">Modification Visiteur</legend>
			
			<label>Identifiant : </label>
			<input name="id" id="id" value="<?php echo $id; ?>" type="text" size="auto" required="required" readonly="readonly"/>
			
			<br /><br />
			
			
			<label>Nom : </label>
			<input name="nom" id="nom" value="<?php echo $nom; ?>" type="text" size="auto" required="required"/> 
			
			<br /><br />
			
			
			<label>Pr&eacute;nom : </label>
			<input name="prenom" id="prenom" value="<?php echo $prenom; ?>" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			
			<label>Adresse : </label>
			<input name="adresse" id="adresse" value="<?php echo $adresse; ?>" type="text" size="auto"/>
			
			<br /><br />
			
			
			<label>Code Postal : </label>
			<input name="cp" id="cp" value="<?php echo $cp; ?>" type="text" size="auto"/>
			
			<br /><br />
			
			<label>Ville : </label>
			<input name="ville" id="ville" value="<?php echo $ville; ?>" type="text" size="auto"/>
			
			<br /><br />
			
			
			<label>Date embauche : </label>
			<input name="dateEmbauche" id="dateEmbauche" value="<?php echo $dateEmbauche; ?>" type="date" placeholder="ex : AAAA-MM-JJ" size="auto"/>
			<br /><br />
			
			
			<label>Nom de compte : </label>
			<input name="nom_de_compte" id="nom_de_compte" value="<?php echo $login; ?>" type="text" size="auto" required="required"/>

			<br /><br />
			
			
			<label>Mot de passe : </label>
			<input name="mot_de_passe" id="mot_de_passe" value="<?php echo $pwd; ?>" type="text" size="auto" required="required"/>
			
			<br /><br />
			
			
			<input id="button" class="button" type="submit" value="Modifier"/>
			
		
		
		</fieldset> 
		
	</form>
	
	<br />
	<br />
	<br />
	
</body>

</html>