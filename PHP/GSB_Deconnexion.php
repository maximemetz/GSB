<?php @session_start();
@session_unset();
@session_destroy();

$Message = "Deconnexion reussie";
echo "<meta http-equiv='refresh' content='0;url=GSB_Authentification.php?message=<font color=green> Deconnexion reussie </font>'>";
exit;
?>