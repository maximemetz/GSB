<?php @session_start();
include "connectAD.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Affichage Visiteurs</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<div id="bandeau">
	<div id="menu">
	    <a href="GSB_Comptable.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
	</div>
    <div id="titre">
		Liste des visiteur(s)
	</div>
	<div id="logo">
		<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
	</div>
</div>

<br />
<br />

<div id="erreur">
<?php
	if (isset($_GET['message']))
		echo $_GET['message'];
?>
</div>

<br />
<br />


<center>
	
	<form>
		
<?php
		$sql="SELECT * FROM Visiteur ORDER BY nom";
		$nombrevisiteur = compteSQL($sql);
		$resultat = tableSQL($sql);
		
		
		echo "<table border=1>";
		echo "<thead>
		    <tr>
				<th>Nom</th>
				<th>Pr&eacute;nom</th>
				<th>Adresse</th>
				<th>Code postal</th>
				<th>Ville</th>
				<th>Date d'embauche</th>
				<th>Nom de compte </th>
				<th>Mot de passe</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		  </thead>
		  <tbody>";
		
		
		$compteur=0;
		
		if ($nombrevisiteur>0) {
		
			foreach ($resultat as $ligne) {
			
			//on extrait chaque valeur de la ligne courante
			$idVisiteur   = $ligne[0];
			$nom          = $ligne[1];
			$prenom       = $ligne[2];
			$adresse      = $ligne[3];
			$cp           = $ligne[4];
			$ville        = $ligne[5];
			$dateEmbauche = $ligne[6];
			$login        = $ligne[7];
			$pwd          = $ligne[8];


			$compteur++;
			if ($compteur %2 == 0) 
				echo "<tr id=\"fonce\">"; 
			else 
				echo "<tr>";
			
			echo "<td>".$nom."</td>";
			
			echo "<td>".$prenom."</td>";
			
			echo "<td>".$adresse."</td>";
			
			echo "<td>".$cp."</td>";
			
			echo "<td>".$ville."</td>";
			
			echo "<td>".$dateEmbauche."</td>";
			
			echo "<td>".$login."</td>";
			
			echo "<td>".$pwd."</td>";
			
			echo "<td> <a href=\"GSB_ModifierVisiteur.php?id=$idVisiteur\"> <img src=\"../IMAGE/UpdButton.png\" title=\"Modifier...\" /></a></td>";
			
			echo "<td> <a href=\"GSB_SupprimerVisiteur.php?id=$idVisiteur\"> <img src=\"../IMAGE/DelButton.png\" onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\" title=\"Supprimer...\" /></a></td>";
			
			
			echo "</tr>";
			
			}
		
		} else {
		
			echo "<tr>";
			
			echo "<td>Aucune information...</td>";
			
			echo "</tr>";
		
		}
		
		echo "</tbody>
		</table> ";
?>

	</form>
	
</center>

<br />
<br />

</body>
</html>