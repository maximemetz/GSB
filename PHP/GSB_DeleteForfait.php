<?php @session_start();

include "connectAD.php";

$id = $_GET['id'];

$sqldelete = "DELETE FROM Forfait WHERE id='$id'";

$result = executeSQL($sqldelete);

if ($result) {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=green> Suppression realisee </font>'>";
} else {
	echo "<meta http-equiv='refresh' content='0;url=GSB_AfficheForfait.php?message=<font color=red> Probleme de suppression... </font>'>";
}

?>