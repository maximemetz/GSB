<?php @session_start();

include "connectAD.php";

//on recupere toutes les valeurs entrees dans le formulaire de creation de visiteur
$mois   = $_GET['mois'];
$annee  = $_GET['annee'];
$repas  = $_GET['repas'];
$nuitee = $_GET['nuitee'];
$etape  = $_GET['etape'];
$km     = $_GET['km'];

$sqlprixrepas ="SELECT montant FROM Forfait WHERE id = 'REP' ;";
$sqlprixnuitee ="SELECT montant FROM Forfait WHERE id = 'NUI';";
$sqlprixetape ="SELECT montant FROM Forfait WHERE id = 'ETP';";
$sqlprixkm ="SELECT montant FROM Forfait WHERE id = 'KM';";

$prixrepas = champSQL($sqlprixrepas);
$prixnuitee = champSQL($sqlprixnuitee);
$prixetape = champSQL($sqlprixetape);
$prixkm = champSQL($sqlprixkm);

$montant = ($repas * $prixrepas) + ($nuitee * $prixnuitee) + ($etape * $prixetape) + ($km * $prixkm);

$idVisiteur = $_SESSION["id"];

$sqlinsert = "INSERT INTO 
FicheFrais (idVisiteur, mois, annee, montantValide) 
VALUES 
('$idVisiteur', '$mois', '$annee', '$montant');";

//execution de la requete dans la base de donnees
$sql = executeSQL1($sqlinsert);

$sqlidfichefrais ="SELECT id FROM FicheFrais WHERE mois='$mois' AND annee='$annee' AND idVisiteur='$idVisiteur';";
$id = champSQL($sqlidfichefrais);

$sqlinsertrepas = "INSERT INTO 
LigneFraisForfait (idFicheForfait, idForfait, quantite) 
VALUES 
('$id', 'REP', '$repas');";

$sqlinsertnuitee = "INSERT INTO 
LigneFraisForfait (idFicheForfait, idForfait, quantite) 
VALUES 
('$id', 'NUI', '$nuitee');";

$sqlinsertetape = "INSERT INTO 
LigneFraisForfait (idFicheForfait, idForfait, quantite) 
VALUES 
('$id', 'ETP', '$etape');";

$sqlinsertkm = "INSERT INTO 
LigneFraisForfait (idFicheForfait, idForfait, quantite) 
VALUES 
('$id', 'KM', '$km');";

$sqlrepas = executeSQL($sqlinsertrepas);
$sqlnuitee = executeSQL($sqlinsertnuitee);
$sqletape = executeSQL($sqlinsertetape);
$sqlkm = executeSQL($sqlinsertkm);

//test sur la requete SQL et affichage message personnalise a l'utilisateur si reussi ou non 
if ($sql && $sqlrepas && $sqlnuitee && $sqletape && $sqlkm) {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheFicheFrais.php?message=<font color=green> Ajout realise </font>'>";
} else {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheFicheFrais.php?message=<font color=red> Erreur </font>'>";
}

?>