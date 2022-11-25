<?php
include('Connexion.php');

$statement = $db->prepare("DELETE FROM agent WHERE NUMCNI_AGENT= :NUMCNI_AGENT");
$statement->execute($_GET);
header("Location: liste_agent.php");
?>