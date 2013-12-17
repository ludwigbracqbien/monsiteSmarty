<?php
include_once('..//includes/connexion.inc.php');
$idArt=$_GET['id'];
$sql=("DELETE FROM articles WHERE ID_article='$idArt'");
mysql_query($sql);
unlink("img/$idArt.jpg"); 		
?>

