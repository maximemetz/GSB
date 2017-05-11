<?php @session_start();

include "connectAD.php";

$idVisiteur = $_GET['visiteur'];

$sqlprenom ="SELECT prenom FROM Visiteur WHERE id = '$idVisiteur';";
$sqlnom ="SELECT nom FROM Visiteur WHERE id = '$idVisiteur';";

$prenom = champSQL($sqlprenom);
$nom = champSQL($sqlnom);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   

<title></title>

<link href="../CSS/GSB.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	
	<div id="bandeau">
		<div id="menu">
		    <a href="GSB_Comptable.php"><img src="../IMAGE/menu.png" alt="Menu"/></a>
		</div>
	    <div id="titre">
			Choix Ann&eacute;e
		</div>
		<div id="logo">
			<a href="GSB_Deconnexion.php"><img src="../IMAGE/GSB_Logo.png"/></a>
		</div>
	</div>

<br /><br /><br /><br /><br /><br />
     
<form action="GSB_ChoixMois.php" method="get">
    <fieldset>
        
        <label>Id </label>
		<input name="idVisiteur" id="idVisiteur" value="<?php echo $idVisiteur ?>" type="text" size="auto" readonly="readonly"/>
        
        <label>Nom </label>
		<input name="nom" id="nom" value="<?php echo $nom ?>" type="text" size="auto" readonly="readonly"/>
		
		<br />
		
		<label>Pr&eacute;nom </label>
		<input name="prenom" id="prenom" value="<?php echo $prenom ?>" type="text" size="auto" readonly="readonly"/>
		
		<br /><br />
			
        <select name="annee">
            <?php
           
                $sql = "SELECT DISTINCT idVisiteur, annee
                        FROM FicheFrais
                        WHERE idVisiteur = '$idVisiteur'
                        AND idEtat = 'CL'";    
                        //récupérer toutes les années qui possède une fiche de frais
                $ResultatVisiteur = tableSQL($sql);
               
                foreach($ResultatVisiteur as $key => $value) {                    //affichage de toutes les données
            ?>
            <option><?= $value['annee']?></option>
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