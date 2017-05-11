<?php @session_start(); include "connectAD.php"; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Affichage Fiche Frais</title>
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
		
		<div class="ecrit">  		
		<?php
			echo "Fiche de frais de : ", $_SESSION["prenom"], " ", $_SESSION["nom"];
		?>
		</div>
		
		<br />
		<br />
		<br />
		<br />

			<?php
			$id = $_SESSION["id"];
					
			$sql = "SELECT *
					FROM  FicheFrais, Visiteur, Etat
					WHERE Visiteur.id = FicheFrais.idVisiteur
					AND Etat.id = FicheFrais.idEtat
					AND Visiteur.id ='$id'";
			$nombrefichefrais = compteSQL($sql);
			$resultat = tableSQL($sql);
			
			echo "<table border=1>";
				echo "
				<thead>
				    <tr>
				    	<th>Mois</th>
						<th>Ann&eacute;e</th>
						<th>Montant (&euro;)</th>
						<th>&Eacute;tat de la fiche</th>
						<th>Modifier</th>
						<th>Supprimer</th>
						<th>Voir</th>
					</tr>
				</thead>
				<tbody>";
					
					$compteur=0;
					
					if ($nombrefichefrais>0) {
					
						foreach ($resultat as $ligne) {
							
							//on extrait chaque valeur de la ligne courante
							$idFicheFrais = $ligne[0];
							$mois         = $ligne[2];
							$annee        = $ligne[3];
							$montant      = $ligne[5];
							$etat         = $ligne[7];
							
							
							$compteur++;
							
							if ($compteur %2 == 0) {
								echo "<tr id=\"fonce\">"; 
							} else {
								echo "<tr>";
							}
							
							echo "<td>".$mois."</td>";
							
							echo "<td>".$annee."</td>";
							
							echo "<td>".$montant."</td>";
							
							echo "<td>".$etat."</td>";
							
							if($etat == "CR"){
							
								echo "<td> <a href=\"GSB_ModifierFicheFraisVisiteur.php?id=$idFicheFrais\"> <img src=\"../IMAGE/UpdButton.png\" title=\"Modifier\" /></a></td>";
								
								echo "<td> <a href=\"GSB_SupprimerFicheFrais.php?id=$idFicheFrais\"> <img src=\"../IMAGE/DelButton.png\" onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\" title=\"Supprimer\" /></a></td>";
								
								echo "<td> <a href=\"GSB_VoirFicheFrais.php?id=$idFicheFrais\"> <img src=\"../IMAGE/VoirButton.png\" title=\"Voir\" /></a></td>";
								
							} else { 
								
								echo "<td> </td>";
								
								echo"<td> </td>";
								
								echo "<td> <a href=\"GSB_VoirFicheFrais.php?id=$idFicheFrais\"> <img src=\"../IMAGE/VoirButton.png\" title=\"Voir\" /></a></td>";
								
							}
						
							echo "</tr>";
							
						}
						
					} else {
					
						echo "<tr>";
						
						echo "<td colspan=\"7\"><h2>Aucune information...</h2></td>";
						
						echo "</tr>";
							
					}
					
				echo "
				</tbody>
			</table> ";
			
		?>
		
		<br />
		<br />
		<br />	

	</body>

</html>