<?php @session_start();

include "connectAD.php";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   

<title>Choix Visiteur</title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	
	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Comptable.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
		</div>
	    <div id="titre">
			Choix Visiteur
		</div>
		<div id="logo">
			<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
		</div>
	</div>

<br /><br /><br /><br /><br /><br />
     
<form action="GSB_ChoixAnnee.php" method="get">
    
    <fieldset id="select">
        
        <select name="visiteur">
            
            <?php
           
                $sql = "SELECT DISTINCT id, nom, prenom
                        FROM Visiteur";
                $ResultatVisiteur = tableSQL($sql);
               
                foreach($ResultatVisiteur as $key => $value) { 
            ?>
            
            <option value="<?= $value['id']?>"><?= $value['nom']." ".$value['prenom'] ?></option>
            
            <?php } ?>
            
        </select>
        
        <br /><br />
		
		<input id="button" class="button" type="submit" value="Valider"/>
		
    </fieldset>
    
</form>

<br />
<br />
<br />

</body>

</html>