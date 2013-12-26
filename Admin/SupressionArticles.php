<?php
include_once('..//includes/connexion.inc.php');
$idArt=$_GET['id']; // Récupération de l'id de l'article par l'url
$sql=("DELETE FROM articles WHERE ID_article='$idArt'");  //Suppression de l'article
mysql_query($sql);
unlink("img/$idArt.jpg");  //Suppression de l'image
$sql=("DELETE FROM commentaires WHERE ID_article_Com='$idArt'");  //Suppression des commentaires
mysql_query($sql);
?>
		<SCRIPT LANGUAGE=JAVASCRIPT>
		window.location = '..//index.php'; //Redirection JavaScript
		</SCRIPT>
			


