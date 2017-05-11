<?php

include "connectAD.php";

?>

<form>

	<table border="1">
	
	<?php
		$sql="SELECT * FROM Forfait";
		$results = TableSQL($sql);		

		//creation de l'interface de saisie pour chaque champs de la table FraisForfait
		foreach ($results as $row) {
			$id=$row['0'];
			$libelle=$row['1'];
			$montant=$row['2'];
			
			echo "<tr>
		             	<td width=\"180\" height=\"30\"> &nbsp;$libelle : </td>                          
			            <td width=\"60\" height=\"30\"> &nbsp;<input id=\"$id\" name=\"$id\" type=\"number\" min=\"0\" value=\"0\" /> 	
			      </tr>	";	
		}
	?>
				    <tr>
						<td width="180" height="40"> <input id="submit" type="submit" name="submit" value="Soumettre la requete" /></td>
		    			<td width="60" height="40"> <input type="reset" value="Effacer" /> </td>	
		  		    </tr>  		 
	</table>  
	
</form>