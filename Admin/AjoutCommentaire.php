<?php
include_once('../includes/connexion.inc.php');
error_reporting(0);

$Pseudo=$_POST['Pseudo'];  //Récupération des variables par méthode POST
$Mail=$_POST['Mail'];
$Commentaire=$_POST['Com'];
$Idart=$_POST['idart'];
$dateactu=date('Y/m/d');  //Mise en forme de la date pour insertion
$sql=("INSERT INTO commentaires (ID_article_Com,Commentaire,Mail,pseudo,Date_Com) VALUES('$Idart','$Commentaire','$Mail','$Pseudo','$dateactu')");
//REQUETE d'insertion des données dans la table commentaires

mysql_query($sql);//Execution de la requete sql.

header("Location: ../Commentaires.php?IdArtCom=$Idart"); //Redirection en php
?>