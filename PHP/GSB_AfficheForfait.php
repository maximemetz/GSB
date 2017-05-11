<?php @session_start();
include "connectAD.php";
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
		Liste des forfait(s)
	</div>
	<div id="logo">
		<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
	</div>
</div>

<br />
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
		$sql="SELECT * FROM Forfait";
		$nombreforfait = compteSQL($sql);
		$resultat = tableSQL($sql);
		
		
		echo "<table border=1>";
		echo "<thead>
		    <tr>
		    	<th>Id</th>
				<th>Libelle</th>
				<th>Montant (&euro;)</th>
		    	<th>Modifier</th>
			    <th>Supprimer</th>
		      </tr>
		  </thead>
		  <tbody>";
		
		
		$compteur=0;
		
		if ($nombreforfait>0) {
		
			foreach ($resultat as $ligne) {
			
			//on extrait chaque valeur de la ligne courante
			$id      = $ligne[0];
			$libelle = $ligne[1];
			$montant = $ligne[2];
			
			
			$compteur++;
			if ($compteur %2 == 0) 
				echo "<tr id=\"fonce\">"; 
			else 
				echo "<tr>";
				
			
			echo "<td>".$id."</td>";
			
			echo "<td>".$libelle."</td>";
			
			echo "<td>".$montant."</td>";
			
			echo "<td> <a href=\"GSB_ModificationForfait.php?id=$id\"> <img src=\"../IMAGE/UpdButton.png\" title=\"Modifier...\" /></a></td>";
			
			echo "<td> <a href=\"GSB_DeleteForfait.php?id=$id\"> <img src=\"../IMAGE/DelButton.png\" onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\" title=\"Supprimer...\" /></a></td>";
			
			
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
<br />

<form action="GSB_AjouterForfait.php" method="get">
	<fieldset>
		<input id="button" class="button" type="submit" value="Nouveau Forfait"/>
	</fieldset>	
</form>

<br />
<br />
<br />

</body>

</html>